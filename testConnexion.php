<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Informations de connexion à la base de données
    $servername = "192.168.1.15";
    $username = "healthnorth";
    $password = "healthnorth-password";
    $dbname = "inscriptions";

    try {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $nom = trim($_POST['Nom']);
        $password = $_POST['password'];

        // Validation des données
        if (empty($nom) || empty($password)) {
            die("Le nom et le mot de passe sont obligatoires.");
        }

        // Préparation de la requête pour récupérer l'utilisateur
        $sql = "SELECT id_patient, nom mot_de_passe FROM patient WHERE nom = :nom";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':nom' => $nom]);

        // Vérification si l'utilisateur existe
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $user['mot_de_passe'])) {
                $_SESSION['id_patient'] = $user['id_patient'];
                $_SESSION['nom'] = $user['nom'];
            
                header("Location: lien.php");
                
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}
?>
