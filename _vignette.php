<!-- Vignette produit description -->
<div class="vignette">
    <a href="#" class="vignette-image" title="<?php echo ($unproduct->getName()); ?>">
        <img src="assets/img/<?php echo ($unproduct->getImage()); ?>" alt="Pardon je vous la pique 2s" />
    </a>
    <h3><?php echo ($unproduct->getName()); ?></h3>
    <p class="prix"><?php echo ($unproduct->getPrice()); ?>€</p>


    <!-- Vignette produit action -->
    <div class="action-vignette">
        <p>
            <a href="#">
                <i class="fas fa-search-plus"></i>
            </a>
        </p>
        <p>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a href="#">
                    <i class="fas fa-cart-arrow-down"></i>
                </a>
            <?php
            } else {
            ?>
                <a href="connexion.php">
                    <i class="fas fa-plug"></i>
                </a>
            <?php
            }
            ?>
        </p>
    </div>
</div>