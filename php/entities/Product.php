<?php
require_once('Database.php');

class Product extends Database
{
    private $id;
    private $name;
    private $shortdescription;
    private $description;
    private $image;
    private $price;

    /**
     * Constructeur de la classe Product
     */
    public function __construct()
    {
        parent::__construct();
    }

    /** Récupération de tous les produits */
    public function getProducts($q = null)
    {
        // Connexion à la BDD
        $uneconnexion = new Database();
        $connexion = $uneconnexion->dbco;
    
        // On construit la requête
        $req = "SELECT id FROM product";
        if ($q) {
            $req .= " WHERE name LIKE :q OR shortdescription LIKE :q OR description LIKE :q";
            $result = $connexion->prepare($req);
            $result->execute(['q' => '%' . $q . '%']);
        } else {
            $result = $connexion->prepare($req);
            $result->execute();
        }

        // On récupére tous les ID des produits en BDD
        $tableau = $result->fetchAll(PDO::FETCH_OBJ);
    
        return $tableau;
    }

    /**
     * Récupération des données d'un produit selon son ID
     */
    public function getProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";

        $result = $this->dbco->prepare($sql);
        $result->execute([
            'id' => $id
        ]);

        $tableau = $result->fetch(PDO::FETCH_ASSOC);

        $this->id = $tableau['id'];
        $this->name = $tableau['name'];
        $this->shortdescription = $tableau['shortdescription'];
        $this->description = $tableau['description'];
        $this->image = $tableau['image'];
        $this->price = $tableau['price'];
    }

    /**
     * Get product id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get product name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get product shortdescription
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }

    /**
     * Get product description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get product image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get product price
     */
    public function getPrice()
    {
        return $this->price;
    }
}
