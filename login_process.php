<?php
// app/views/admin/login_process.php

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations d'authentification
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Remplacer ces informations avec celles de votre base de données
    $db_username = "root"; // Remplacez par le nom d'utilisateur de la base de données
    $db_password = "mokhadia1999"; // Remplacez par le mot de passe de la base de données

    // Vérifier les informations d'authentification
    if ($username === $db_username && $password === $db_password) {
        // Authentification réussie, rediriger vers le tableau de bord administrateur
        header("Location: dashboard.php");
        exit;
    } else {
        // Informations d'authentification incorrectes, rediriger vers la page de connexion avec un message d'erreur
        header("Location: login.php?error=1");
        exit;
    }
} else {
    // Si le formulaire n'a pas été soumis, rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}
?>
