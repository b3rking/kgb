<?php

namespace src\config;

use PDOException;
use PDO;

class Database {

    private $host = "localhost";
    private $db_name = "kgb";
    private $username = "b3rking";
    private $password = "1234";
    public $conn;

    public function getConnection(): object
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
        } catch(PDOException $e) {
            echo "connection error".$e->getMessage();
        }

        return $this->conn;
    }
}