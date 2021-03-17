<?php
require_once('Database.php');

class User extends Database
{
    // Propriétés
    private $id;
    private $prenom;
    private $nom;
    private $email;
    private $pwd;

    /**
     * Constructeur de la classe User
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Inscription d'un utilisateur en BDD
     */
    public function addUser($data)
    {
        // Connexion à la BDD
        $connexion = $this->connection();

        // On test les valeurs et nettoie le $POST
        $registered = $this->sanitizeUser($data);

        if (!$registered) {
            $registered = "success";
            // Requete d'ajout d'utilisateur
            try {
                // Début de la transaction
                $connexion->beginTransaction();

                // Requête d'insertion
                $req = $connexion->prepare("INSERT INTO user VALUES (:id, :nom, :prenom, :email, :pwd) ");
                $req->execute(['id' => NULL, 'nom' => $data['nom'], 'prenom' => $data['prenom'], 'email' => $data['email'], 'pwd' => $data['password']]);

                // Si on arrive ici, alors on exécute la transaction :)
                $connexion->commit();

            } catch (PDOException $exception) {
                // On annule la transaction (on remet dans l'état initial)
                $connexion->rollback();

                // On gère l'exception
                die($exception->getMessage());
            }
        }
        return $registered;
    }


    /**
     * Initialisation d'un utilisateur
     */
    public function sanitizeUser($data)
    {
        // Nettoyage des données
        $nom = filter_var($data['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($data['prenom'], FILTER_SANITIZE_STRING);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
        $passwordConfirm = filter_var($data['passwordConfirm'], FILTER_SANITIZE_STRING);

        $error = '';

        /*******************    TEST DES CHAMPS DU FORMULAIRE    ****************************** */
        // Test de la confirmation du mot de passe
        if ($password != $passwordConfirm) {
            $error = 'password';
        }
        // Test de la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'email';
        }
        /*******************    FIN TEST DES CHAMPS DU FORMULAIRE    ****************************** */
 
        // Test de l'existence d'un mail dans la base
        if ($this->checkUser($email)) {
            $error = 'already';
        }

        return $error;
    }

    /**
     * Récupération des données d'un utilisateur en BDD par son mail
     */
    public function checkUser($email)
    {
        // Connexion à la BDD
        $dbco = $this->connection();

        // Récupération des données en bdd
        $req = $dbco->prepare("SELECT * FROM user where email=:email");
        $req->execute([
            'email' => $email,
        ]);

        // Mise des résultats dans un tableau tout propre tout beau
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Renvoi des résultats
        return $result;
    }

    /**
     * Récupération des données d'un utilisateur en BDD par son ID
     */
    public function getUser($id)
    {
        // Connexion à la BDD
        $dbco = $this->connection();

        // Récupération des données en bdd
        $req = $dbco->prepare('SELECT * FROM user where id=:id;');
        $req->execute([
            'id' => $id,
        ]);

        // Mise des résultats dans un tableau tout propre tout beau
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Renvoi des résultats
        return $result;
    }
}
