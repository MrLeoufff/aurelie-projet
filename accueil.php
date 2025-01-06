<?php
session_start();
if (isset($_SESSION['utilisateur'])) {
    header('Location: accueil.php'); // Redirection si déjà connecté
    exit();
}

$erreur_connexion = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    // Connexion à la base de données
    $pdo = new PDO("mysql:host=192.168.1.15;dbname=inscriptions;charset=utf8", "healthnorth", "healthnorth-password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // Vérification des identifiants
    $stmt = $pdo->prepare("SELECT * FROM patient WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $utilisateur = $stmt->fetch();

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        $_SESSION['utilisateur'] = $utilisateur['nom']; // Connexion réussie
        header('Location: accueil.php');
        exit();
    } else {
        $erreur_connexion = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>health_north</title>
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="topnav">
            <a class="active" href="accueil.php" aria-label="Accueil">Accueil</a>
            <a href="inscription.php" aria-label="Inscription">Inscription</a>
            <a href="quiSommesNous.php" aria-label="Qui sommes-nous ?">Qui sommes-nous?</a>
            <a href="carte.php" aria-label="Nous contacter">Contact</a>
            <a href="lien.php" aria-label="Créer un rendez-vous">Créer un rendez-vous</a>
            <a href="planningmedecin.php" aria-label="Voir le planning du médecin">Planning</a>
            <a href="centre.php" aria-label="Voir la liste des centres disponibles">Liste des centres</a>
        </div>

        <!-- Formulaire de connexion -->
        <div class="col-md-6 col-md-offset-3">
            <h3>Connexion</h3>
            <?php if (!empty($erreur_connexion)): ?>
                <div class="alert alert-danger"><?=htmlspecialchars($erreur_connexion)?></div>
            <?php endif;?>
            <form action="accueil.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a href="inscription.php" class="btn btn-link">Pas encore inscrit ? Cliquez ici</a>
            </form>
        </div>

        <center><img src="assets/batimentlabo.jpg" width="1100px" height="600px"></center>

        <h2>
            <center>HEALTH NORTH</center>
        </h2>
        <br />
        <br />

        <center>
            <table>
                <tr>
                    <td></td>
                    <td>Nombre médecin : 5000</td>
                    <td>Nombre de clinique : 300</td>
                    <td>Nombre d'employés : 12000</td>
                </tr>
            </table>
        </center>
        <br />
        <center>
            <table>
                <tr>
                    <th>Nombre d'imagerie : 1200</th>
                    <th>Chiffre d'affaire : plus de 50 milliards annuels</th>
                    <th>Nombre d'analyses : 8 millions par an</th>
                </tr>
            </table>
        </center>
        <center><br>
            <div class="container">
                <img src="assets/covid.jpg" />
                <img src="assets/sida.jpg" />
                <img src="assets/endo.jpg" />
                <footer>
                    <center>
                        <h5> ©2024 HEALTH NORTH - Tous droits réservés.</h5>
                        <h5>Contactez-nous : contact@healthnorth.fr | 03 20 xx xx xx</h5>
                    </center>
                </footer>
            </div>
        </center>
    </div>

</body>

</html>
