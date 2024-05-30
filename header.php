<?php
  require_once('config/mysql.php');
  require_once('variables.php');
  require_once('functions.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/recettes/index.php">Site de recettes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/recettes/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/recettes/contact.php">Contact</a>
        </li>
        <?php if(isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/recettes/recipes/create.php">Ajoutez une recette</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/recettes/logout.php">Se Deconnecter</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>