<?php
// On inclut la classe User
require_once('php/entities/User.php');

// Si les champs de connexion sont remplis
$error = '';

if (!empty($_POST)) {
    // On vérifie l'existence de l'user
    $user = new User();
    $sanitize = $user->sanitizeFormData($_POST);
    $error = $user->checkUserExists($sanitize['email'], $sanitize['pwd']);

    if ($error) {
        header('Location: ./');
    }else{
        header('Location: ./connexion.php');
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
                <form class="app-form" method="post" action="#">
                    <fieldset>
                        <legend class="bg-light">Vos informations de connexion</legend>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="email">Votre email</label>
                            </div>
                            <div class="col">
                                <input type="text" id="email" name="email" class="form-control" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="pwd">Votre mot de passe</label>
                            </div>
                            <div class="col">
                                <input type="password" id="pwd" name="pwd" class="form-control" />
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