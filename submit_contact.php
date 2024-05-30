<?php session_start(); ?>
<?php
    if (!isset($_POST['email']) || !isset($_POST['message']) || empty($_POST['message'])) {
        echo('Il faut un email ET un message pour soumettre le formulaire !');
        return;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçu</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
    <?php include_once('header.php'); ?>
    
    <div class="container">
        <h1>Message bien reçu !</h1>
        
        <div class="card">  
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo htmlspecialchars($_POST['email']); ?></p>
                <p class="card-text"><b>Message</b> : <?php echo strip_tags($_POST['message']); ?></p>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>