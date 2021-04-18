<?php

namespace src\objects;
use PDOException;

class Note {

    /*
    * classe pour travailler avec les notes
    *
    * classe notes permet de :
    * -lire les notes enregistrer
    * -poster des notes
    * -mettre a jour une notes
    * -supprimer une note
    *
    * @author      b3rking
    * @package     src/objects
    *
    **/

    // db connection and table
    private $conn;
    
    //object property
    public $user_id;
    public $body;
    public $created;
    public $modified;
    public $title;

    /**
     * 
     *  fonction d'initialisation du notebook
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
     *  fonction qui renvoie tout les notes
     * 
     *  @return array
     */

    public function all():object 
    {
        $query = "SELECT * FROM notes ORDER BY created";
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
     *  @return array
     */

    public function getOne($id) {

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