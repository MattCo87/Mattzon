<!-- Traitement du message -->
<?php 
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
        <!-- Application header -->
        <header class="app-header">

            <!-- Logo du site-->
            <h1>
                <a href="index.php"> <span>a</span>Mattzon<span>.fr</span> </a>
            </h1>

            <!-- Barre de navigation du site-->
            <nav class="app-mainmenu">
                <ul class="menu">
                    <li>
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-address-book"></i>
                            Catalogue
                        </a>
                    </li>
                    <li>
                        <a href="connexion.php">
                            <i class="fas fa-power-off"></i>
                            Connexion</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-cart-arrow-down"></i> 
                            Mon panier</a>
                    </li>
                    <li>
                        <a href="contact.html">
                            <i class="fas fa-mail-bulk"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Barre de recherche PC -->
            <div class="barre-recherche-pc">
                <a href="#">
                    <i class="fas fa-search"></i>
                    Recherche
                </a>
            </div>

            <!-- Barre de recherche Tablette -->
            <div class="barre-recherche-tablette">
                <input type="text" name="recherche" id="rechercher" placeholder="Recherche" size="15">
            </div>

            <!-- Menu Hamburger -->
            <div class="hamburger">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </header>

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
                            <select id="demande">
                                <option> Générale </option>
                                <option> Professionnelle </option>
                                <option> Personnelle </option>
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
        <footer class="app-footer">
            <h2>Footer</h2>
        </footer>
    </body>
</html>