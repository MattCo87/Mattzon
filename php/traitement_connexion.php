<?php

// Connexion à la base de données
require_once('connexion_bdd.php');

// Récupération des données du formulaire
$id = '';
$email = $_POST['email'];
$pwd = $_POST['password'];
$requete = '';
$resultat = '';
$error = '';
$acces = false;


// Requete qui récupère un utilisateur selon le mail est indiqué
$sql = "SELECT `id` FROM `user` WHERE `email`='$email'";
$requete = $connexion->query($sql);
$resultat = $requete->fetch();

// Test s'il existe un résultat à la requête
if($resultat != ''){

    // Requete pour récupérer toutes les données de l'utilisateur
    $id = $resultat['id'];
    $sql = "SELECT * FROM `user` WHERE `id`= $id ";
    $requete = $connexion->query($sql);
    $result = $requete->fetch();

    // Test du mot de passe retourné par la requete précédente
    if ($pwd==$result['pwd']) {

        // accès au site autorisé
        $acces = true;
        $error= 'registered';
    } else {

        // Le mot de passe ne correspond pas
        $error= 'nomatch';
    }

// Sinon le compte n'existe pas
} else {
    $error= 'invalide';
}

// Redirection
if ($acces) {
    // Vers index en mode connecté
    Header('Location: ../index.php?message=' . $error);
} else {
    // Vers la page de connexion avec message d'erreur
    Header('Location: ../connexion.php?message=' . $error);
}