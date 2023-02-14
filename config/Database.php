<?php
    namespace Config;
    // PDO Requirement
    use PDO;
    use PDOException;

    class Database{
        // No need to make constructor to init database because this only db connection
        protected $host = "localhost";
        protected $db_name = "junior_task";
        protected $username = "root";
        protected $password = "root";
        public $conn;

        public function getConn(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host={$this->host}; dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $e){
                echo "Database could not be connected: " . $e->getMessage();
            }
            return $this->conn;
        }
    }