<?php

namespace src\objects;

use PDO;
use PDOException;

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
    public $joined;

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
        $this->id = null;
    }

    /**
     * 
     *  fonction qui renvoie tout les utilisateurs
     * 
     *  @return array
     */

    public function all() {
        $query = "SELECT * FROM users ORDER BY joined";
        $data = $this->conn->prepare($query);
        $data->execute();
        return $data;
    }

    public function save() {
        try {
            // the query for inserting data
            $query = "INSERT INTO ".$this->table_name."id=:id, fullname=:fullname, email=:email, username=:username, password=:password, joined=:joined";
            
            $stmt = $this->conn->prepare($query);

            // escaping the data
            $this->fullname = htmlspecialchars($this->fullname);
            $this->email = htmlspecialchars($this->email);
            $this->username = htmlspecialchars($this->username);

            //binding data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':fullname', $this->fullname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':joined', $this->joined);

            // execute the query

            if($stmt->execute()) {
                return json_encode(['message' => 'done']);
            } else {
                return json_encode(['message' => 'nope']);
            }

        } catch(PDOException $e) {
            die("error ".$e->getMessage());
            return json_encode(['message' => 'fail']);
        }
    }
}