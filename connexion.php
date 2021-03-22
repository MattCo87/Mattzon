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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/b916232238.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/styles.css" />

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous" defer></script>
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
                    <div class="alert alert-danger alert-dismissible fade show" id="errorMsg" role="alert">
                        <?php echo $_GET['err']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form class="app-form" method="post">
                    <fieldset>
                        <legend class="bg-light mb-3">Vos informations de connexion</legend>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="email">Votre email *</label>
                            </div>
                            <div class="col">
                                <input type="text" id="email" name="email" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="pwd">Votre mot de passe *</label>
                            </div>
                            <div class="col">
                                <input type="password" id="pwd" name="pwd" class="form-control" required />
                            </div>
                        </div>
                    </fieldset>

                    <hr />

                    <div class="row">
                        <div class="col text-center">
                            <button type="cancel" class="btn btn-link">Effacer</button>
                        </div>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary ">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>


        <?php include('_footer.php'); ?>
    </body>
</html>