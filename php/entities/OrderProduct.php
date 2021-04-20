<?php
require_once('Database.php');

class OrderProduct extends Database
{
    private $idorders;
    private $idproduct;
    private $quantity;
    private $price;


    /**
     * Constructeur de la classe OrderProduct
     */
    public function __construct()
    {
        parent::__construct();

    }


    public function addOrderProduct($data)
    {
        try {
            // Début de la transaction
            $this->dbco->beginTransaction();
            // Requête d'insertion
            $sql = "INSERT INTO orders_product(id_orders, id_product, quantity, price) VALUES (:idorders, :idproduct, :quantity, :price) ";
            $req = $this->dbco->prepare($sql);
            $req->execute([
                'idorders' => $data['idorders'],
                'idproduct' => $data['idproduct'],
                'quantity' => $data['quantity'],
                'price' => $data['price']
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