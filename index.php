<?php
// app/controllers/IndexController.php

// Inclure le fichier de connexion à la base de données
require_once 'models/ConnexionManager.php';

// Récupérer les articles depuis la base de données
function getArticles()
{
    $bdd = ConnexionManager::getInstance();

    try {
        $query = $bdd->query("SELECT * FROM Article");
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des articles : " . $e->getMessage());
    }
}

$articles = getArticles();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ACTUALITES POLYTECHNICIENNES</title>
    <style>
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f1f1f1;
        }

        nav li {
            float: left;
        }

        nav li a {
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav li a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>ACTUALITES POLYTECHNICIENNES</h1>
    
    <nav>
        <ul>
            <li><a href="index.php">ACCUEIL</a></li>
            <li><a href="sport.php">SPORT</a></li>
            <li><a href="sante.php">SANTE</a></li>
            <li><a href="education.php">EDUCATION</a></li>
            <li><a href="politique.php">POLITIQUE</a></li>
        </ul>
    
    </nav>
    <h2>LES DERNIERES ACTIVITES</h2>
    <div id="content">
        <?php
        if (count($articles) > 0) {
            foreach ($articles as $article) {
                echo "<h3>" . $article['titre'] . "</h3>";
                echo "<p>" . $article['contenu'] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "Aucun article trouvé.";
        }
        ?>
    </div>
</body>
</html>
