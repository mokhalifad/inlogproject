<?php
// app/controllers/ArticleController.php

class ArticleController
{
    private $article;

    public function __construct($db)
    {
        $this->article = new Article($db);
    }

    public function index()
    {
        $articles = $this->article->getAllArticles();
        // Code pour afficher les articles dans la vue
    }

    public function add()
    {
        // Code pour afficher le formulaire d'ajout d'article
        // Lorsque le formulaire est soumis, récupérer les données et appeler la méthode addArticle()
    }

    public function delete($id)
    {
        if ($this->article->deleteArticle($id)) {
            // Article supprimé avec succès
        } else {
            // Échec de la suppression de l'article
        }
    }
}
?>
