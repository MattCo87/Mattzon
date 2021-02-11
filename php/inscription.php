<?php

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$passwordconfirm = $_POST['passwordconfirm'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$formulaireok = 1;

// Test de non-nullité du champ
foreach ($_POST as $key => $value)
    if (empty($value)){
        echo "Le champ '" . $key . "' doit être rempli !<br>";
        $formulaireok =  0;
    }  

// Test de la confirmation du mot de passe
if ($password != $passwordconfirm) {
    echo "ATTENTION: votre mot de passe n'est pas confirmé !<br>";
    $formulaireok =  0;
}

if ($formulaireok == 1){

// Nettoyage des données
// Test de l'email confirmé par l'input type 'email'
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Nettoyage du nom et prenom / supprime tout sauf chiffre - et +
//  $nom = filter_var($nom, FILTER_SANITIZE_NUMBER_INT);
//  $prenom = filter_var($prenom, FILTER_SANITIZE_NUMBER_INT); 

// Nettoyage du nom et prenom des balises
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);


// Affichage des données nettoyées
    echo "<p><font size=5>Bonjour " . $prenom . "&nbsp" . $nom . "</font></p>";
    echo "<p><font color='green'>Votre compte est actif: " . $email . "</font></p>";
    
}else{
    echo "<br><font color='red' size=5>Votre inscription n'est pas prise en compte</font>";
}
