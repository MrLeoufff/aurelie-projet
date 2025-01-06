<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    <a href=Accueil.php aria-label="Accueil">Accueil</a>
        <a href="quiSommesNous.php" aria-label="Qui sommes-nous">Qui sommes-nous?</a>
        <a class="active"href="carte" aria-label="Nous contacter">Contact</a>
        <a href="lien.php" aria-label="Créer un rendez-vous">Créer un rendez-vous</a>
        <a href="planningmedecin.php" aria-label="Voir le planning du médecin">Planning</a>
        <a href="centre.php" aria-label="Voir la liste des centres disponibles">Liste des centres</a>
    </div>


 

   <img src="assets/labo.jpg "width="900px"heignt='500px'>

    
        <form action="testConnexion.php" method="POST">
            <label for="Nom">Nom</label>
            <input type="text" id="Nom" name="Nom" required>

             <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Se connecter">

    </form>
    </div>
</body>
</html>
  