<?php
    session_start();

    include_once('./../config/mysql.php');
    include_once('./../variables.php');

    if (!isset($_POST['id'])) {
        echo 'Il faut un identifiant valide pour supprimer une recette.';
        return;
    }

    $deleteRecipeStatement = $db->prepare('DELETE FROM recipes WHERE recipe_id = :recipe_id');
    $deleteRecipeStatement->execute([
        'recipe_id' => $_POST['id'],
    ]) or die(print_r($db->errorInfo()));

    header('Location: http://localhost/recettes/index.php');
?>