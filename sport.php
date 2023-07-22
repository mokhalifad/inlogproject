<?php
// app/views/sport.php

// Inclure le fichier header.php pour avoir une structure de page cohérente
include 'layout/header.php';
?>

<h2>Sport</h2>
<div id="content">
    <?php
    // Code PHP pour récupérer et afficher les articles de la catégorie "Sport"
    $articles = getArticlesByCategory(1); // Remplacez l'argument 1 par l'ID de la catégorie "Sport" dans votre base de données

    if (!empty($articles)) {
        foreach ($articles as $article) {
            echo "<h3>" . $article['titre'] . "</h3>";
            echo "<p>" . $article['contenu'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Aucun article disponible dans la catégorie Sport.";
    }
    ?>
</div>

<?php
// Inclure le fichier footer.php pour terminer la structure de page
include 'layout/footer.php';
?>
