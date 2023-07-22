<?php
// controllers/AdminController.php

require_once 'models/Article.php';

class AdminController
{
    public function login()
    {
        // Code pour afficher le formulaire de connexion administrateur
        // Lorsque le formulaire est soumis, vérifier les informations d'authentification et rediriger vers le tableau de bord admin
        // (Le code du formulaire et du traitement du formulaire de connexion peut être ajouté ici)
        // Exemple :
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifier les informations d'authentification ici
            // Si l'authentification est réussie, rediriger vers le tableau de bord admin
            header("Location: index.php?action=dashboard");
        } else {
            // Afficher le formulaire de connexion
            require_once 'views/admin/login.php';
        }
    }

    public function dashboard()
    {
        // Vérifier si l'administrateur est connecté, sinon rediriger vers la page de connexion
        // Exemple :
        // if (!isset($_SESSION['admin'])) {
        //     header("Location: index.php?action=login");
        //     exit;
        // }

        // Code pour afficher le tableau de bord admin avec les options pour ajouter et supprimer des articles
        // Vous pouvez utiliser la fonction getArticlesByCategory du modèle Article pour récupérer les articles de chaque catégorie
        $articles = Article::getArticlesByCategory();
        require_once 'views/admin/dashboard.php';
    }

    public function addArticle()
    {
        // Code pour gérer l'ajout d'un nouvel article
        // (Le code de validation et d'insertion de l'article peut être ajouté ici)
        // Exemple :
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire et valider les données
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $categorie = $_POST['categorie'];

            // Insérer l'article dans la base de données
            $result = Article::addArticle($titre, $contenu, $categorie);

            if ($result) {
                // Rediriger vers le tableau de bord avec un message de succès
                header("Location: index.php?action=dashboard&message=Article ajouté avec succès !");
            } else {
                // Rediriger vers le tableau de bord avec un message d'erreur
                header("Location: index.php?action=dashboard&error=Erreur lors de l'ajout de l'article.");
            }
        } else {
            // Afficher le formulaire d'ajout d'article
            require_once 'views/admin/add_article.php';
        }
    }

    public function deleteArticle($articleId)
    {
        // Code pour gérer la suppression d'un article en utilisant son ID
        // (Le code de suppression de l'article peut être ajouté ici)
        // Exemple :
        $result = Article::deleteArticle($articleId);

        if ($result) {
            // Rediriger vers le tableau de bord avec un message de succès
            header("Location: index.php?action=dashboard&message=Article supprimé avec succès !");
        } else {
            // Rediriger vers le tableau de bord avec un message d'erreur
            header("Location: index.php?action=dashboard&error=Erreur lors de la suppression de l'article.");
        }
    }
}
?>
