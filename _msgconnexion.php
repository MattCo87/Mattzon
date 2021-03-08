<?php
// Traitement du message d'état de l'utilisateur
$class = '';
$info = '';

if (isset($_GET['message'])) {
    if (!empty($_GET['message'])) {
        switch ($_GET['message']) {
            case 'registered':
                $class = 'success';
                $info = "Bonjour " . $_SESSION['prenom'];
                break;
            case 'msgok';
                $class = 'success';
                $info = "Votre message est envoyé !";
                break;
            case 'disconnected';
                $class = 'info';
                $info = "Vous êtes maintenant déconnecté";
                break;
            default:
                $class = 'error';
                $info = 'Un problème bizarre est survenu…';
                break;
        }
    }
}

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