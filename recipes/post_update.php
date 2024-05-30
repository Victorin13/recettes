<?php
    session_start();

    include_once('./../config/mysql.php');
    include_once('./../variables.php');

    if (!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['recipe'])) {
        echo 'Il manque des informations pour l\'édition de la recette !';
        return;
    }

    // Mise à jour de la recette
    $updateRecipeStatement = $db->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :recipe_id');
    $updateRecipeStatement->execute([
        'title' => $_POST['title'],
        'recipe' => $_POST['recipe'],
        'recipe_id' => $_POST['id'],
    ]) or die(print_r($db->errorInfo()));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include_once('../header.php'); ?>

    <div class="container">
        <!-- Message de succès -->
        <h1>Recette modifiée avec succès !</h1>
        <div class="card"> 
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($_POST['title']); ?></h5>
                <p class="card-text">
                    <b>Email</b> : <?php echo($_SESSION['LOGGED_USER']); ?>
                </p>
                <p class="card-text">
                    <b>Recette</b> : <?php echo strip_tags($_POST['recipe']); ?>
                </p>
            </div>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
</body>
</html>
