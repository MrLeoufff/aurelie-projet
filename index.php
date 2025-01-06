<?php
session_start();
include 'includes/header.php';
?>

<div class="container">
        <div class="topnav">
            <a class="active" href="index.php" aria-label="Accueil">Accueil</a>
            <a href="inscription.php" aria-label="Inscription">Inscription</a>
            <a href="quiSommesNous.php" aria-label="Qui sommes-nous ?">Qui sommes-nous?</a>
            <a href="carte.php" aria-label="Nous contacter">Contact</a>
            <a href="rdv.php" aria-label="Créer un rendez-vous">Créer un rendez-vous</a>
            <a href="planningmedecin.php" aria-label="Voir le planning du médecin">Planning</a>
            <a href="centre.php" aria-label="Voir la liste des centres disponibles">Liste des centres</a>
        </div>

        <center><img src="assets/images/batimentlabo.jpg" width="1100px" height="600px"></center>

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
                <img src="assets/images/covid.jpg" />
                <img src="assets/images/sida.jpg" />
                <img src="assets/images/endo.jpg" />
            </div>
        </center>

    <!-- Messages de session -->
    <?php if (!empty($_SESSION['message_success'])): ?>
        <div class="alert alert-success mt-4">
            <?=htmlspecialchars($_SESSION['message_success'])?>
        </div>
        <?php unset($_SESSION['message_success']);?>
    <?php endif;?>

    <?php if (!empty($_SESSION['message_error'])): ?>
        <div class="alert alert-danger mt-4">
            <?=htmlspecialchars($_SESSION['message_error'])?>
        </div>
        <?php unset($_SESSION['message_error']);?>
    <?php endif;?>

    <!-- Formulaire de connexion ou message de bienvenue -->
    <div class="mt-5">
        <?php if (isset($_SESSION['utilisateur'])): ?>
            <div class="alert alert-info">
                Bienvenue, <?=htmlspecialchars($_SESSION['utilisateur'])?> !
            </div>
            <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-danger w-100">Se déconnecter</button>
            </form>
        <?php else: ?>
            <form action="login.php" method="POST" class="mt-4">
                <h3 class="text-center">Connexion</h3>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Se connecter</button>
                <p class="text-center mt-3">
                    Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a>
                </p>
            </form>
        <?php endif;?>
    </div>


<?php include 'includes/footer.php';?>
</div>
