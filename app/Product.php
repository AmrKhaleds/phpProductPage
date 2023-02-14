<?php
    namespace App;
    
    class Product{
        // Declare class Variable 
        private $conn;
        private $db_table = "products";
        public $id;
        public $sku;
        public $name;
        public $price;
        public $productType;
        public $size;
        public $height;
        public $width;
        public $length;
        public $weight;
        // Init database connectopn for this class
        public function __construct($db){
            $this->conn = $db;
        }
        // Get all products
        public function getProducts(){
            $sqlQuery = "SELECT * FROM {$this->db_table} ORDER BY id DESC;";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
        // create Product
        public function createProduct(){
            $sqlQuery = "INSERT INTO {$this->db_table} SET 
                        sku         = :sku,
                        name        = :name,
                        price       = :price,
                        productType = :productType,
                        size        = :size,
                        height      = :height,
                        width       = :width,
                        length      = :length,
                        weight      = :weight
                        ";
            $stmt = $this->conn->prepare($sqlQuery);
            // validate fields 
            function validate($value){
                $value=htmlspecialchars(strip_tags($value));
            }
            validate($this->sku);
            validate($this->name);
            validate($this->price);
            validate($this->productType);
            validate($this->size);
            validate($this->height);
            validate($this->width);
            validate($this->length);
            validate($this->weight);
            // merge variable data
            $stmt->bindParam(":sku",         $this->sku);
            $stmt->bindParam(":name",        $this->name);
            $stmt->bindParam(":price",       $this->price);
            $stmt->bindParam(":productType", $this->productType);
            $stmt->bindParam(":size",        $this->size);
            $stmt->bindParam(":height",      $this->height);
            $stmt->bindParam(":width",       $this->width);
            $stmt->bindParam(":length",      $this->length);
            $stmt->bindParam(":weight",      $this->weight);
                
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // Delete Product 
        public function deleteProduct(){
            $sqlQuery = "DELETE FROM {$this->db_table} WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(1, $this->id);
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }