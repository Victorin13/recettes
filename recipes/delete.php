<?php 
    session_start();

    include_once('./../config/mysql.php');
    include_once('./../variables.php');

    // Si on n'a pas un identifiant de recette numerique, on arrête
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo('Il faut un identifiant numerique pour supprimer la recette !');
        return;
    }

    // On recupère la recette à supprimer
    $toDeleteRecipeStatement = $db -> prepare('SELECT * FROM recipes WHERE recipe_id = :recipe_id');
    $toDeleteRecipeStatement -> execute([
        'recipe_id' => $_GET['id'],
    ]) or die(print_r($db->errorInfo()));
    $toDeleteRecipe = $toDeleteRecipeStatement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Suppression de recette ?</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <?php include_once('../header.php'); ?>

    <div class="container">
        <h1>Supprimer la recette "<?php echo $toDeleteRecipe['title'] ?>" ?</h1>
        <form action="http://localhost/recettes/recipes/post_delete.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id']; ?>">
            </div>
            
            <button type="submit" class="btn btn-danger">Suppression définitive</button>
        </form>
        <br />
    </div>

    <?php include_once('../footer.php'); ?>
</body>
</html>