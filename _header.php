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
            
            <?php if(!isset($_SESSION['id'])): ?>
                <li>
                    <a href="connexion.php">
                        <i class="fas fa-plug"></i>
                        Connexion
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="php/traitement_deconnexion.php">
                        <i class="fas fa-power-off"></i>
                        Déconnexion
                    </a>
                </li>
            <?php endif; ?>
            
            <li>
                <a href="#">
                    <i class="fas fa-cart-arrow-down"></i> 
                    Mon panier</a>
            </li>
            <li>
                <a href="contact.php">
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