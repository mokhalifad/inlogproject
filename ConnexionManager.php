<?php
// app/models/ConnexionManager.php

// Classe de gestion de la connexion à la base de données
class ConnexionManager
{
    private static $bdd;

    // Méthode pour établir la connexion à la base de données
    public static function getInstance()
    {
        if (!isset(self::$bdd)) {
            $host = 'localhost'; // Remplacez par l'hôte de votre base de données
            $dbname = 'mglsi_news'; // Remplacez par le nom de votre base de données
            $username = 'root'; // Remplacez par le nom d'utilisateur de votre base de données
            $password = 'mokhadia1999'; // Remplacez par le mot de passe de votre base de données

            try {
                self::$bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }

        return self::$bdd;
    }
}
