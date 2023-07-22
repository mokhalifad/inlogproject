<?php
// app/views/education.php

// Inclure le fichier header.php pour avoir une structure de page cohérente
include 'layout/header.php';
?>

<h2>Education</h2>
<div id="content">
    <?php
    // Code PHP pour récupérer et afficher les articles de la catégorie "Education"
    $articles = getArticlesByCategory(3); // Remplacez l'argument 3 par l'ID de la catégorie "Education" dans votre base de données

    if (!empty($articles)) {
        foreach ($articles as $article) {
            echo "<h3>" . $article['titre'] . "</h3>";
            echo "<p>" . $article['contenu'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Aucun article disponible dans la catégorie Education.";
    }
    ?>
</div>

<?php
// Inclure le fichier footer.php pour terminer la structure de page
include 'layout/footer.php';
?>
