<?php
require_once('php/entities/User.php');

// On accède à la session
session_start();

if (isset($_SESSION['user'])) {
    $user = new User($_SESSION['user']['id']);
} else {
    $user = null;
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>aMattzon</title>
        <meta name="description" content="Blablabla…" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/b916232238.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/styles.css" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>
    </head>

    <body>
        <?php include('_header.php'); ?>

        <main class="app-main">
            <h1>Bonjour <?php echo($user ? $user->getPrenom() . ' ' . $user->getNom() : ''); ?> !</h1>
        </main>

        <?php include('_footer.php'); ?>
    </body>
</html>