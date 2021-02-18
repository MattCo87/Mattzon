<!-- Traitement du message -->
<?php
$class = '';
$info = '';

if (isset($_GET['message'])) {
    if (!empty($_GET['message'])) {
        switch ($_GET['message']) {
            case 'nomatch':
                $class = 'error';
                $info = "Le mot de passe n'est pas valide.";
                break;
            case 'invalide':
                $class = 'error';
                $info = "Ce compte n'existe pas.";
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

            <!-- Section connexion -->
            <section class="connexion">

                <!-- Titre d'inscription -->
                
                <h2><i class="fas fa-power-off"></i> &nbsp Connexion</h2>

                <!-- Affichage du message -->
                <?php if (!empty($class)): ?>
                    <p class="<?php echo $class; ?>">
                        <?php echo $info; ?>
                    </p>
                <?php endif; ?>
                <!-- Fin Affichage du message -->

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
        <footer class="app-footer">
            <h2>Footer</h2>
        </footer>
    </body>
</html>