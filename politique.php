<?php
// app/views/politique.php

// Inclure le fichier header.php pour avoir une structure de page cohérente
include 'layout/header.php';
?>

<h2>Politique</h2>
<div id="content">
    <?php
    // Code PHP pour récupérer et afficher les articles de la catégorie "Politique"
    $articles = getArticlesByCategory(4); // Remplacez l'argument 4 par l'ID de la catégorie "Politique" dans votre base de données

    if (!empty($articles)) {
        foreach ($articles as $article) {
            echo "<h3>" . $article['titre'] . "</h3>";
            echo "<p>" . $article['contenu'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Aucun article disponible dans la catégorie Politique.";
    }
    ?>
</div>

<?php
// Inclure le fichier footer.php pour terminer la structure de page
include 'layout/footer.php';
?>
