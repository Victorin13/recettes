<?php
// On verifie l'existence d'infos de connexion
if (isset($_POST['email']) &&  isset($_POST['password'])) {

    foreach ($users as $user) {
        // Si infos correctes alors on cree un cookie et une session pour l'utilisateur connecté
        if ($_POST['email'] === $user['email'] && $_POST['password'] === $user['password']) {
            // Cookie expirant dans 1an
            setcookie(
                'LOGGED_USER',
                $user['email'],
                [
                    'expires' => time() + 60,
                    'secure' => true,
                    'httponly' => true,
                ]
            );

            $_SESSION['LOGGED_USER'] = $user['email'];
        } 
        // Sinon on stocke un message d'erreur
        else {
            $errorMessage = sprintf('Informations incorrectes : (%s/%s)',
            $_POST['email'], $_POST['password']);
        }  
    }
}
?>

<?php
// Si cookie ou session alors on l'enregistre
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER']
    ];
}
else {
    if (isset($loggedUser)) {
        unset($loggedUser);
    }
}
var_dump(isset($loggedUser), isset($loggedUser['email']));
?>

<!-- Si utilisateur non connecte alors on affiche formulaire -->
<?php if(!isset($loggedUser['email'])) : ?>
    <h2>Veuillez vous authentifier !</h2>
    <form action="http://localhost/recettes/index.php" method="post">
        <!-- Si message d'erreur alors on l'affiche -->
        <?php if(isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
            <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
    <div>Pas encore un compte ? <a href="http://localhost/recettes/users/create.php">Creer un compte</a></div>
<!-- Sinon on affiche message de bienvenue -->
<?php else : ?>
    <div class="alert alert-success" role="alert">
        Bonjour et bienvenue : <?php echo $loggedUser['email']; ?>
    </div>
<?php endif; ?>