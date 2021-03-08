<!-- Traitement du message -->
<?php 
session_start();

?>
<!-- Fin du traitement du message -->

<!DOCTYPE html>
<html>
    <head>
        <!-- Informations destinées au navigateur -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Informations destinées au SEO (Search Engine Optimization = référencement naturel) -->
        <title>aMattzon : Panier</title>

        <!-- Feuilles de styles -->

        <!-- Ajouter lien du style -->


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="assets/css/styles.css" />
    </head>

    <body>
        <!-- Header inclusion -->
        <?php include('_header.php'); ?>

        <!-- Application main -->
        <main class="app-maincontenu">
            <section class="panier">
                <h2>Mon panier</h2>
                <?php if(isset($_SESSION['panier'])): ?>
                    <?php foreach($_SESSION['panier'] as $key => $item): ?>
                        <p>produit #<?php echo $item['id']; ?> : <?php echo $item['qte']; ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="info">Votre panier est vide.</p>
                <?php endif; ?>
            </section>
        </main>

        <!-- Application footer-->
        <?php include('_footer.php'); ?>
    </body>
</html>