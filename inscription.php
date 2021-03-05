<!-- Traitement du message -->
<?php 
session_start();
if(isset($_SESSION['id'])) {
    Header('Location: index.php');
}

$info = '';

if(isset($_GET['message'])){
    if(!empty($_GET['message'])){
        switch($_GET['message']) {
            case 'empty' :
                $info = 'Tous les champs sont obligatoires.';
            break;
            case 'email' :
                $info = "Cet email n'est pas valide.";
            break;
            case 'password' :
                $info = 'Les deux mots de passe doivent être identiques.';
            break;
            case 'already' :
                $info = 'Il existe déjà un compte associé à cet adresse e-mail.';
            break;
            default :
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>

        <!-- Header inclusion -->
        <?php include('_header.php'); ?>

        <!-- Application main -->
        <main class="app-maincontenu">

            <!-- Section inscription -->
            <section class="inscription">
                <h2>
                    <!-- Affichage du message -->
                    <?php if (!empty($info)){ ?>
                        <p class="error">
                            <?php echo $info; ?>
                        </p>
                    <?php //Titre d'inscription
                        }else{
                                echo "Inscrivez-vous !";
                        } ?>
                <!-- Fin Affichage du message -->
                </h2>
                <!-- Formulaire d'inscription-->
                <form method="post" action="php/traitement_inscription.php">
                    <fieldset>
                        <legend>
                            Vos informations de connexion
                        </legend>
                        
                        <div class="form-group">
                            <label for="email">Votre email :</label>
                            <input type="text" name="email" id="email" />
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Votre mot de passe :</label>
                            <input type="password" name="password" id="password" />
                        </div>
                        
                        <div class="form-group">
                            <label for="passwordconfirm">Confirmation :</label>
                            <input type="password" name="passwordconfirm" id="passwordconfirm" />
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>
                            Vos informations personnelles
                        </legend>
                        
                        <div class="form-group">
                            <label for="prenom">Votre prénom :</label>
                            <input type="text" name="prenom" id="prenom" />
                        </div>
                        
                        <div class="form-group">
                            <label for="nom">Votre nom :</label>
                            <input type="text" name="nom" id="nom" />
                        </div>
                        
                    </fieldset>
                    
                    <fieldset class="submit">
                        <div class="form-group">
                            <button type="cancel">
                                Annuler
                            </button>
                            <button type="submit">
                                Enregistrer
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