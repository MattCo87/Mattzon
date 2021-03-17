<?php

class Database {
    private $servname;
    private $dbname;
    private $user;
    private $pass;

    public function __construct() {
        // On renseigne les valeurs de nos propriétés
        $this->servname = 'localhost';
        $this->dbname = 'mattzon';
        $this->user = 'root';
        $this->pass = '';
    }


    public function connection() {
        // On tente de se connecter à la BDD
        try {
            $dbco = new PDO("mysql:host={$this->servname};dbname={$this->dbname}", $this->user, $this->pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbco;
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}