<?php 
// session_start();
session_destroy();
unset($loggedUser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Deconnexion</title>
</head>
<body>
    <?php 
    // include_once('login.php'); 
    // var_dump($_COOKIE);
    header('Location: http://localhost/recettes/login.php');
    ?>
</body>
</html>

