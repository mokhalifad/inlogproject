<?php
// app/views/admin/logout.php

// Démarre la session si elle n'a pas déjà été démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Détruit toutes les données de session
session_destroy();

// Redirige vers la page de connexion après la déconnexion
header("Location: login.php");
exit;
