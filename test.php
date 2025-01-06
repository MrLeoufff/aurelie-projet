

<?php
session_start();  // Démarre la session

// Connexion à la base de données
$servername = "192.168.1.15";   // A192.168.1.15dresse du serveur de base de données
$username_db = "healthnorth";       // Nom d'utilisateur de la base de données
$password_db = "healthnorth-password";           // Mot de passe de la base de données
$dbname = "inscriptions";         // Nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['id_patient'])) {
    header("Location: lien.php");
    exit;
}

$error_message = "";

// Traitement du formulaire après soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour vérifier si l'utilisateur existe dans la base de données
    $sql = "SELECT * FROM patient WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // L'utilisateur existe, on récupère les informations
        $user = $result->fetch_assoc();

        // Vérification du mot de passe avec password_verify (si le mot de passe est haché)
        if (password_verify($password, $user['password'])) {
            // Authentification réussie, on stocke l'ID de l'utilisateur dans la session
            $_SESSION['id_patient'] = $user['id_patient'];  // Assurez-vous d'avoir un champ 'id' dans votre table patients
            $_SESSION['username'] = $user['username'];  // Vous pouvez aussi stocker le nom d'utilisateur si nécessaire

            // Redirection vers lien.php
            header("Location: lien.php");
            exit;
        } else {
            // Mot de passe incorrect
            $error_message = "Mot de passe incorrect.";
        }
    } else {
        // L'utilisateur n'existe pas dans la base de données
        $error_message = "Nom d'utilisateur incorrect.";
    }

    // Fermer la connexion préparée
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Inclure ici ton CSS ou les liens vers Bootstrap si nécessaire -->
</head>
<body>
    <div class="container w-50">
        <h2 class="text-center">Se connecter</h2>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</body>
</html>