<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM patient WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $patient = $stmt->fetch();

    if ($patient && password_verify($password, $patient['mdp'])) {
        $_SESSION['id_patient'] = $patient['idpatient'];
        $_SESSION['utilisateur'] = $patient['login']; // Pour afficher le nom de l'utilisateur
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Ajout d'un token CSRF pour sécuriser
        header("Location: index.php"); // Redirection vers la page de prise de rendez-vous
        exit();
    } else {
        $_SESSION['message_error'] = "Identifiants incorrects.";
        header("Location: index.php");
        exit();
    }
}
