<!-- Vignette produit description -->
<div class="vignette">
    <a href="produit.php?id=<?php echo $unproduct->getId(); ?>" class="vignette-image" title="<?php echo($unproduct->getName()); ?>">
        <img src="assets/img/<?php echo($unproduct->getImage()); ?>" alt="Pardon je vous la pique 2s" />
    </a>
    <h3><?php echo($unproduct->getName()); ?></h3>
    <p class="prix"><?php echo($unproduct->getPrice()); ?>€</p>


    <!-- Vignette produit action -->
    <div class="action-vignette">
        <p>
            <a href="produit.php?id=<?php echo $unproduct->getId(); ?>">
                <i class="fas fa-search-plus"></i>
            </a>
        </p>
        <p>
            <a href="#" class="<?php if(isset($_SESSION['user'])): ?>addtocart<?php else: ?>openmodal<?php endif; ?>" data-productid="<?php echo $unproduct->getId(); ?>">
                <i class="fas fa-cart-arrow-down"></i>
            </a>
        </p>
    </div>
</div>