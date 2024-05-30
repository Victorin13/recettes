<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

// Vérification d'existence des infos du formulaire
if (!isset($_POST['title']) || !isset($_POST['recipe'])) : ?>

<!-- Formulaire d'ajout de recette -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Ajout de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include_once('../header.php'); ?>
    
    <div class="container">
        <h1>Ajouter une recette</h1>
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
                <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <?php include_once('../footer.php'); ?>
</body>
</html>

<?php else : ?>
    <!-- Traitement du formulaire d'ajout de recette -->
    <?php 
        // Insertion en base de donnees
        $insertRecipe = $db->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
        $insertRecipe->execute([
            'title' => $_POST['title'],
            'recipe' => $_POST['recipe'],
            'is_enabled' => 1,
            'author' => $_SESSION['LOGGED_USER'],
        ]);
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include_once('../header.php'); ?>

    <div class="container">
    <!-- MESSAGE DE SUCCES -->
        <h1>Recette ajoutée avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($_POST['title']) ; ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo strip_tags($_POST['recipe']); ?></p>
            </div>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
</body>
</html>

<?php endif; ?>