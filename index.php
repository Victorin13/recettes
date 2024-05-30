<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Inclusion de l'en-tête -->
    <?php include_once('header.php'); ?>

    <div class="container">
        <!-- Inclusion du formulaire de connexion -->
        <?php include_once('login.php'); ?>
        
        <?php if(isset($_SESSION['LOGGED_USER'])) : ?>
            <h1>Site de recettes</h1>
            <?php foreach($validRecipes as $recipe) : ?>
                <article>
                    <?php display_recipe($recipe); ?>
                    <i><?php displayAuthor($recipe['author'], $users); ?></i>

                    <!-- Si l'utilisateur connecte est auteur alors on affiche les liens d'editions et de suppression de recettes -->
                    <?php if($_COOKIE['LOGGED_USER'] === $recipe['author'] ||$_SESSION['LOGGED_USER'] === $recipe['author']) : ?>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a class="link-warning" href="http://localhost/recettes/recipes/update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                            <li class="list-group-item"><a class="link-danger" href="http://localhost/recettes/recipes/delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>  
                        </ul>
                    <?php endif; ?>
                    
                </article>
            <?php endforeach ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>