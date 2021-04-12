<?php

namespace src\objects;

class User {

    // db connection and table
    private $conn;
    private $table_name = "users";
    
    //object property
    public $username;
    public $email;
    public $id;
    public $password;
    public $fullname;


    public function __construct($db)
    {
        $this->conn = $db;    
    }

    public function all() {
        $query = "SELECT * FROM ".$this->table_name;
        $data = $this->conn->prepare($query);
        $data->execute();
    }
}