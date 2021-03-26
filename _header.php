<?php
if (isset($_SESSION['cart'])) {
    $cartNb = sizeof($_SESSION['cart']);
} else {
    $cartNb = 0;
}
?>

<header class="app-header mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="./">aMattzon.fr</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogue.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            Mon compte
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (!isset($_SESSION['user'])): ?>
                                <li>
                                    <a class="dropdown-item" href="connexion.php">
                                        <i class="fas fa-plug"></i>
                                        Connexion
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="inscription.php">
                                        <i class="fas fa-user-plus"></i>
                                        Inscription
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a class="dropdown-item" href="deconnexion.php">
                                        <i class="fas fa-power-off"></i>
                                        Déconnexion
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="panier.php">
                            <i class="fas fa-shopping-cart"></i>
                            Mon Panier
                            <sup>
                                <span class="badge bg-secondary" id="cartNb"><?php echo $cartNb; ?></span>
                            </sup>
                        </a>
                    </li>
                </ul>

                <form class="d-flex ml-auto" action="catalogue.php">
                    <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>