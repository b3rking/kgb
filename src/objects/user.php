<?php

namespace src\objects;

use PDO;

class User {

    /*
    * classe pour travailler avec les users
    *
    * classe users permet de :
    * -lire les utilisateurs enregistrer
    * -ajouter un utilisateur
    * -mettre a jour un utilisateur
    * -supprimer un utilisateur
    *
    * @author      b3rking
    * @package     None
    *
    **/

    // db connection and table
    private $conn;
    private $table_name = "users";
    
    //object property
    public $username;
    public $email;
    public $id;
    public $password;
    public $fullname;

    /**
     * 
     *  fonction d'initialisation de l'utilisateur
     *  
     *  @param string $db une instance de la classe Database
     * 
     *  @return bool
     */
    public function __construct($db)
    {
        $this->conn = $db;    
    }

    public function all() {
        $query = "SELECT * FROM ".$this->table_name;
        $data = $this->conn->prepare($query);
        $data->execute();
        $names = $data->fetchAll(PDO::FETCH_ASSOC);
        
        $this->name = $names['username'];
    }

    public function save() {
        $query = "INSERT INTO `".$this->table_name."`(`id`, `fullname`, `email`, `username`, `password`) VALUES (
            $this->id,
            $this->fullname,
            $this->email,
            $this->username,
            bcrypt($this->password);
    }
}