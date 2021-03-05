<!-- Traitement du message -->
<?php 
session_start();

$info = '';

if(isset($_POST['message'])){
    if(!empty($_POST['message'])){
        switch($_POST['message']) {
            case 'empty' :
                $info = 'Tous les champs sont obligatoires.';
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

        <!-- Ajouter lien du style -->


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <!-- Header inclusion -->
        <?php include('_header.php'); ?>

        <!-- Application main -->
        <main class="app-maincontenu">
            
            <section class="contact">
                <h2>Ecrivez-nous !</h2>

                <!-- Creation du formulaire -->
                <form method="post" action="php/traitement_contact.php">

                    <!-- Zone Vos coordonnées -->
                    <!-- Titre de la zone -->
                    <fieldset class="formset">
                        <legend>
                            vos coordonnées
                        </legend>

                        <!-- Champs de la zone coordonnées -->
                        <div class="form-group">
                            <label for="nom">Nom:<span>*</span></label>
                            <input type="text" name="nom" id="nom" required />
                        </div>           
                        <div class="form-group">
                            <label for="prenom">Prénom:<span>*</span></label>
                            <input type="text" name="prenom" id="prenom" required />
                        </div>          
                        <div class="form-group">
                            <label for="email">Mail:<span>*</span></label>
                            <input type="email" name="email" id="email" required />
                        </div>
                    </fieldset>

                    <!-- Zone Votre message -->
                    <!-- Titre de la zone -->
                    <fieldset class="formset">
                        <legend>
                            votre message
                        </legend>

                       <!-- Champs de la zone message -->               
                        <div class="form-group">
                            <label for="type" name="demande">Type de demande:<span>*</span></label>
                            <select id="demande" name="demande">
                                <option value="gen"> Générale </option>
                                <option value="pro"> Professionnelle </option>
                                <option value="perso"> Personnelle </option>
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="sujet">Sujet:<span>*</span></label>
                            <input type="text" name="sujet" id="sujet" required />
                        </div>       
                        <div class="form-group">
                            <label for="message" id="description">Message:<span>*</span></label>
                            <textarea name="description" id="description" rows="7" cols="30" required ></textarea>
                        </div>
                    </fieldset>

                    <!-- Zone Bouton Soumettre -->            
                    <fieldset class="submit">
                        <div class="form-envoyer">
                            <button type="submit">
                                Envoyer
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