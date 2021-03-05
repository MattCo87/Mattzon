<!-- Traitement du message -->
<?php

$class = '';
$info = '';

if (isset($_GET['message'])) {
    if (!empty($_GET['message'])) {
        switch ($_GET['message']) {
            case 'invalide':
                $class = 'error';
                $info = "E-mail ou mot de passe incorrect.";
                break;
            default:
                $class = 'error';
                $info = 'Un problème bizarre est survenu…';
                break;
        }
    }
}
?>
<!-- Fin du traitement du message -->

<!DOCTYPE html>
<html>
    <head>
        <!-- Informations destinées au navigateur -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Informations destinées au SEO (Search Engine Optimization = référencement naturel) -->
        <title>aMattzon</title>

        <!-- Feuilles de styles -->

        <!-- Ajouter lien du style -->


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <!-- Header inclusion -->
        <?php include('_header.php'); ?>

        <!-- Application main -->
        <main class="app-maincontenu">

            <!-- Section connexion -->
            <section class="connexion">

                <!-- Titre d'inscription -->              
                <!-- Affichage du message -->
                <h2>
                    <?php if (!empty($info)){ ?>
                        <p class="error">
                            <?php echo $info; ?>
                        </p>
                    <?php //Titre d'inscription
                        }else{
                                echo "<i class='fas fa-power-off'></i> &nbsp Connexion";
                        } ?>
                    <!-- Fin Affichage du message -->
                </h2>
                <!-- Formulaire de connexion-->
                <form method="post" action="php/traitement_connexion.php">
                    <fieldset>
                        <legend>
                            Vos informations de connexion
                        </legend>
                        
                        <div class="form-group">
                            <label for="email">Votre email :</label>
                            <input type="email" name="email" id="email" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Votre mot de passe :</label>
                            <input type="password" name="password" id="password" required />
                        </div>
                    </fieldset>

                    <fieldset class="submit">
                        <div class="form-group">
                            <button type="cancel">
                                Annuler
                            </button>
                            <button type="submit">
                                Se connecter
                            </button>
                        </div>
                    </fieldset>
                </form>
            </section>

        </main>

        <!-- Application footer-->
        <?php include('_footer.php'); ?>
    </body>
</html>