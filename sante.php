<?php
// app/views/sante.php

// Inclure le fichier header.php pour avoir une structure de page cohérente
include 'layout/header.php';
?>

<h2>Santé</h2>
<div id="content">
    <?php
    // Code PHP pour récupérer et afficher les articles de la catégorie "Santé"
    $articles = getArticlesByCategory(2); // Remplacez l'argument 2 par l'ID de la catégorie "Santé" dans votre base de données

    if (!empty($articles)) {
        foreach ($articles as $article) {
            echo "<h3>" . $article['titre'] . "</h3>";
            echo "<p>" . $article['contenu'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Aucun article disponible dans la catégorie Santé.";
    }
    ?>
</div>

<?php
// Inclure le fichier footer.php pour terminer la structure de page
include 'layout/footer.php';
?>
