<?php
// app/models/Article.php

class Article
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllArticles()
    {
        $query = "SELECT * FROM Article";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addArticle($titre, $contenu, $categorie)
    {
        $query = "INSERT INTO Article (titre, contenu, categorie) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $titre);
        $stmt->bindParam(2, $contenu);
        $stmt->bindParam(3, $categorie);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteArticle($id)
    {
        $query = "DELETE FROM Article WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Autres méthodes de la classe Article

    // Méthode pour récupérer les articles par catégorie
    public static function getArticlesByCategory($categoryId)
    {
        // Assurez-vous de remplacer 'localhost', 'root', 'mokhadia1999' et 'mglsi_news' par vos propres informations de connexion
        $conn = new PDO('mysql:host=localhost;dbname=mglsi_news;charset=utf8', 'root', 'mokhadia1999');

        // Préparez la requête SQL
        $stmt = $conn->prepare('SELECT * FROM Article WHERE categorie = :categoryId');
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        // Exécutez la requête
        $stmt->execute();

        // Récupérez les résultats sous forme de tableau associatif
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fermez la connexion à la base de données
        $conn = null;

        return $articles;
    }
}
?>
