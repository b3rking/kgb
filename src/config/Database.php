<?php

namespace src\config;

use PDOException;
use PDO;

class Database {

    private $host = "localhost";
    private $db_name = "kgb";
    private $username = "root";
    private $password = "";
    public $connection;

    public function getConnection() {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host".$this->host.";dbname".$this->db_name, $this->username, $this->password);
        } catch(PDOException $e) {
            echo "connection error".$e->getMessage();
        }

        return $this->connection;
    }
}