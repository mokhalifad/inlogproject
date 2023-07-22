<?php
// app/views/admin/dashboard.php

// Vérifier si l'utilisateur est authentifié
session_start();
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord Administrateur</title>
</head>
<body>
    <h1>Tableau de bord Administrateur</h1>

    <h2>Liste des Articles</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Catégorie</th>
            <th>Action</th>
        </tr>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['titre']; ?></td>
            <td><?php echo $article['contenu']; ?></td>
            <td><?php echo $article['categorie']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $article['id']; ?>">Modifier</a> |
                <a href="delete.php?id=<?php echo $article['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ajouter un Article</h2>
    <form action="add.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="contenu">Contenu :</label>
        <textarea id="contenu" name="contenu" required></textarea><br>

        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="1">Sport</option>
            <option value="2">Santé</option>
            <option value="3">Éducation</option>
            <option value="4">Politique</option>
        </select><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>