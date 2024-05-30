<?php

// Récupération des variables depuis la base de donnees
$usersStatement = $db->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$validRecipesStatement = $db->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');
$validRecipesStatement->execute();
$validRecipes = $validRecipesStatement->fetchAll();

/* if(isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = (int) $_GET['limit'];
} else {
    $limit = 100;
} */

// Si le cookie est présent
/* if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
} */

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

var_dump($rootPath, $rootUrl);