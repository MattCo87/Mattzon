<?php
require_once('Database.php');

class Order extends Database
{
    private $id;
    private $dateconfirm;
    private $datedelivery;
    private $receiver;
    private $adress;
    private $contact;
    private $status;
    private $iduser;

    /**
     * Constructeur de la classe Order
     */
    public function __construct($id = false)
    {
        parent::__construct();

        if ($id) {
            $order = $this->getOrder($id);

            if ($order) {
                $this->id = $order['id'];
                $this->dateconfirm = $order['dateconfirm'];
                $this->datedelivery = $order['datedelivery'];
                $this->receiver = $order['receiver'];
                $this->adress = $order['adress'];
                $this->contact = $order['contact'];
                $this->status = $order['status'];
                $this->iduser = $order['iduser'];
            } else {
                return false;
            }
        }
    }

    /**
     * Récupération des données d'un utilisateur en BDD par son ID
     */
    public function getOrder($id)
    {
        // Récupération des données en bdd
        $req = $this->dbco->prepare('SELECT * FROM orders where id=:id;');
        $req->execute([
            'id' => $id,
        ]);

        // Mise des résultats dans un tableau tout propre tout beau
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Renvoi des résultats
        return $result;
    }


    public function addOrder($data)
    {
        try {
            // Début de la transaction
            $this->dbco->beginTransaction();
            // Requête d'insertion
            $sql = "INSERT INTO orders(date_confirm, date_delivery, receiver, adress, contact, live, id_user) VALUES (:dateconfirm, :datedelivery, :receiver, :adress, :contact, :live, :iduser) ";
            $req = $this->dbco->prepare($sql);
            $req->execute([
                'dateconfirm' => $data['dateconfirm'],
                'datedelivery' => $data['datedelivery'],
                'receiver' => $data['receiver'],
                'adress' => $data['adress'],
                'contact' => $data['contact'],
                'live' => $data['live'],
                'iduser' => $data['iduser']
            ]);

            // Si on arrive ici, alors on exécute la transaction :)
            $this->dbco->commit();
        } catch (PDOException $exception) {
            // On annule la transaction (on remet dans l'état initial)
            $$this->dbco->rollback();

            // On gère l'exception
            die($exception->getMessage());
        }
        return false;
    }
}
