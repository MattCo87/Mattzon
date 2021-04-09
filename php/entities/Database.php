<?php


class Database
{
    public $dbco;

    public function __construct($isHelper = false)
    {
        // On appelle la connexion à la bdd
        $this->dbco = $this->connection($isHelper);
    }


    public function connection($isHelper)
    {
        if ($isHelper) {
            require("../../config/bdd.php");
        }else {
            require("config/bdd.php");
        }

        // On tente de se connecter à la BDD
        try {
            $dbco = new PDO("mysql:host={$servname};dbname={$dbname}", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $dbco;
    }
}
