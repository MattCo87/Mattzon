<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = 'localhost';
$username = 'root';
$password = '';
$database = "mattzon";
            
// On établit la connexion
try {
    $connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $connexion = null;
}
