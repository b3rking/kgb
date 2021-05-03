<?php

namespace src\objects;

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
     *  @param object $db une instance de la classe Database
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

    public function all():object
    {
        $query = "SELECT * FROM users ORDER BY joined";
        $data = $this->conn->prepare($query);
        $data->execute();
        return $data;
    }

    /**
     * 
     *  fonction pour retourner un seul utilisateur
     * 
     *  fonction qui permet de renvoyer un seul utilisateur depuis la base de *     données
     *
     * @param string $username nom de l'utilisateur!
     *  
     *  @return object
     */

    public function getOne(string $username) {

        $query = "SELECT * FROM users WHERE username =:username";
        $data = $this->conn->prepare($query);

        $data->bindParam(':username', $username);
        $data->execute();

        return $data;
    }


    /**
     * 
     *  fonction pour retourner un seul utilisateur
     * 
     *  fonction qui permet de renvoyer un seul utilisateur depuis la base de *     données
     *
     * @param int $id numero de l'utilisateur!
     *  
     *  @return object
     */

    public function getOneById(int $id) {

        $query = "SELECT * FROM users WHERE id =:id";
        $data = $this->conn->prepare($query);

        $data->bindParam(':id', $id);
        $data->execute();

        return $data;
    }
    


    /**
     * 
     *  fonction pour enregistrer un utilisateur
     * 
     *  fonction qui permet d'ajouter un nouveau utilisateur dans la base de       *  données 
     *  
     *  @return array
     */

    public function save() {
        try {
            // the query for inserting data
            $query = "INSERT INTO users SET id=:id, fullname=:fullname, email=:email, username=:username, password=:password, joined=:joined";
            
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
                return json_encode(['message' => 'successfuly created your account!']);
            } else {
                return json_encode(['message' => 'operation failed! :(']);
            }

        } catch(PDOException $e) {
            die("error ".$e->getMessage());
            return json_encode(['message' => 'fail']);
        }
    }

    /**
     * 
     *  fonction pour mettre a jour un seul utilisateur
     * 
     *  fonction qui permet de mettre a jour un seul utilisateur dans la base de *     données
     *  
     *  @return array
     */

    public function update($id) {

        // the query to be executed

        $query = "UPDATE users SET id=:id, fullname=:fullname, email=:email, username=:username, password=:password, joined=:joined, status=:status, bio=:bio, profile_pic=:profile_pic WHERE id =:id";
        $data = $this->conn->prepare($query);

        // escaping special character
        $this->fullname = htmlspecialchars($this->fullname);
        $this->email = htmlspecialchars($this->email);
        $this->username = htmlspecialchars($this->username);
        $this->status = htmlspecialchars($this->status);
        $this->bio = htmlspecialchars($this->bio);

        // binding data
        $data->bindParam(':id', $this->id);
        $data->bindParam(':fullname', $this->fullname);
        $data->bindParam(':email', $this->email);
        $data->bindParam(':username', $this->username);
        $data->bindParam(':password', $this->password);
        $data->bindParam(':joined', $this->joined);
        $data->bindParam(':status', $this->status);
        $data->bindParam(':bio', $this->bio);
        $data->bindParam(':profile_pic', $this->profile_pic);

        if($data->execute()) {
            return json_encode(['message' => 'successfuly created your account!']);
        } else {
            return json_encode(['message' => 'operation failed! :(']);
        }
    }
}