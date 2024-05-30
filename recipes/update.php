<?php
session_start();

include_once('./../config/mysql.php');
include_once('./../variables.php');

// Si on n'a pas un identifiant de recette numerique, on arrête
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo('Il faut un identifiant de recette pour le modifier !');
    return;
}

// On recupère la recette à mettre à jour
$oldRecipeStatement = $db -> prepare('SELECT * FROM recipes WHERE recipe_id = :recipe_id');
$oldRecipeStatement -> execute([
    'recipe_id' => $_GET['id'],
]) or die(print_r($db->errorInfo()));
$oldRecipe = $oldRecipeStatement->fetch(PDO::FETCH_ASSOC);
?>

<!-- Formulaire d'edition de recette -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Edition de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include_once('../header.php'); ?>

    <div class="container">
        <h1>Mettre à jour "<?php echo($oldRecipe['title']); ?>"</h1>
        <form action="http://localhost/recettes/recipes/post_update.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($_GET['id']); ?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Titre de recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" value="<?php echo htmlspecialchars($oldRecipe['title']); ?>">
                <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe">
                <?php echo strip_tags($oldRecipe['recipe']); ?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('../footer.php'); ?>
</body>
</html>
