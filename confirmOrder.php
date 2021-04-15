<?php

// On importe les classes
require_once('php/entities/User.php');
require_once('php/entities/Product.php');
require_once('php/entities/Order.php');



// On accède à la session
session_start();


if (isset($_SESSION['user'])) {
    $user = new User($_SESSION['user']['id']);
} else {
    $user = null;
}


if (!empty($_POST)) {
    // Ajout d'une commande
    $order = new Order();
    $error = $order->addOrder([
        'dateconfirm' => date("Y-m-d H:i:s"),
        'datedelivery' => date("Y-m-d H:i:s"),
        'receiver' => $_POST['name'],
        'adress' => $_POST['adress'],
        'contact' => $_POST['contact'],
        'live' => "En cours de traitement",
        'iduser' => $_SESSION['id'],
    ]);
}

?>


<h1>Merci pour votre achat <?php echo ($user->getPrenom()); ?> !</h1>



<?php
var_dump($_SESSION['cart']);
var_dump($_POST);

?>