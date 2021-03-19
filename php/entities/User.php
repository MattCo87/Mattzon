<?php
require_once('Database.php');

class User extends Database
{
    private $id;
    private $prenom;
    private $nom;
    private $email;
    private $pwd;

    /**
     * Constructeur de la classe User
     */
    public function __construct($id = false)
    {
        parent::__construct();
        
        if ($id) {
            $userData = $this->getUser($id);

            if ($userData) {
                $this->id = $userData['id'];
                $this->prenom = $userData['prenom'];
                $this->nom = $userData['nom'];
                $this->email = $userData['email'];
                $this->pwd = $userData['pwd'];
            } else {
                return false;
            }
        }
    }

    /**
     * Get user id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get user firstname
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Get user lastname
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get user email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Inscription d'un utilisateur en BDD
     */
    public function addUser($data)
    {
        // On teste les valeurs
        $error = $this->validateFormData($data);

        if (!$error) {
            // Pas d'erreur : on nettoie les données
            $data = $this->sanitizeFormData($data);

            // Vérification de l'existence de l''utilisateur
            if (!$this->checkUserExists($data['email'])) {
                // L'utilisateur n'existe pas déjà : on le crée
                try {
                    // Début de la transaction
                    $this->dbco->beginTransaction();

                    // Requête d'insertion
                    $req = $this->dbco->prepare("INSERT INTO user(prenom, nom, email, pwd) VALUES (:prenom, :nom, :email, :pwd) ");
                    $req->execute([
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'],
                        'email' => $data['email'],
                        'pwd' => $data['password']
                    ]);

                    // Si on arrive ici, alors on exécute la transaction :)
                    $this->dbco->commit();
                } catch (PDOException $exception) {
                    // On annule la transaction (on remet dans l'état initial)
                    $$this->dbco->rollback();

                    // On gère l'exception
                    die($exception->getMessage());
                }
            } else {
                // Erreur : l'utilisateur existe déjà
                return 'userexists';
            }
        } else {
            // Erreur de validation des données du formulaire
            return $error;
        }

        return false;
    }

    /**
     * Validation des données du formulaire
     */
    public function validateFormData($data)
    {
        // Test de la confirmation du mot de passe
        if ($data['password'] != $data['passwordConfirm']) {
            return 'passwordconfirm';
        }
        // Test de la validité de l'email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return 'notanemail';
        }

        // Pas d'erreur
        return false;
    }

    /**
     * Nettoyage des données du formulaire
     */
    public function sanitizeFormData($data)
    {
        $data['nom'] = filter_var($data['nom'], FILTER_SANITIZE_STRING);
        $data['prenom'] = filter_var($data['prenom'], FILTER_SANITIZE_STRING);
        $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $data['password'] = filter_var($data['password'], FILTER_SANITIZE_STRING);
        $data['passwordConfirm'] = filter_var($data['passwordConfirm'], FILTER_SANITIZE_STRING);

        return $data;
    }

    /**
     * Récupération des données d'un utilisateur en BDD par son mail et/ou son password
     */
    public function checkUserExists($email, $password = null)
    {
        // Récupération des données en bdd
        $params = [
            'email' => $email,
        ];
        $sqlString = "SELECT * FROM user where email=:email";
        if ($password) {
            $sqlString .= " AND pwd = :pwd";
            $params['pwd'] = $password;
        }

        $req = $this->dbco->prepare($sqlString);
        $req->execute($params);

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
        // Récupération des données en bdd
        $req = $this->dbco->prepare('SELECT * FROM user where id=:id;');
        $req->execute([
            'id' => $id,
        ]);

        // Mise des résultats dans un tableau tout propre tout beau
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Renvoi des résultats
        return $result;
    }
}
