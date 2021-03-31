<?php
// On vérifie qu'aucun utilisateur n'est connecté
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ./');
}

// On inclut la classe User
require_once('php/entities/User.php');

// Si les champs de connexion sont remplis
$error = '';

if (!empty($_POST)) {
    // On vérifie l'existence de l'user
    $user = new User();
    $error = $user->login([
        'email' => $_POST['email'],
        'pwd' => $_POST['pwd'],
    ]);

    if ($error) {
        header('Location: ./connexion.php?err=' . $error);
    } else {
        header('Location: ./');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Connectez-vous - aMattzon</title>
        <meta name="description" content="Blablabla…" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/b916232238.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/styles.css" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>
    </head>

    <body>
        <?php include('_header.php'); ?>

        <main class="app-main">
            <div class="container-fluid">
                <header>
                    <h1 class="bg-light">Connectez-vous</h1>
                </header>
            </div>

            <div class="container my-5">
                <?php if(isset($_GET['err'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_GET['err']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php include ('_formConnexion.php'); ?>
            </div>
        </main>
    </body>
</html>