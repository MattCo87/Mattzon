<?php
// Selon success, disconnected ou error
if (!empty($class)){
?>
    <!-- Affichage du message -->
    <p class="<?php echo $class; ?>">
        <?php echo $info; ?>
    </p>
    <!-- Fin Affichage du message -->
<?php
}
?>