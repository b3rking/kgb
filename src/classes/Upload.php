<?php


namespace src\classes;

/**
 *
 * Class Upload pour gerer l'upload des fichiers
 *
 * @package src\classes
 * @author b3rking
 *
 */
class Upload
{

    /**
     * 
     * 
     * check if the file is valid (not a php file)
     * check the size(less than 1mb)
     * check if file exist
     * rename the file before upload (username + profile_pic)
     * upload the file
     * 
     * @package src/classes
     * @author b3rking
     * 
     * @param string $name le nom du fichier
     * @param int $size la taille du fichier
     * @param string $destination le dossier de destination
     * 
     */

    private $name;
    private $type;
    private $size;
    private $upload;
    private $tmp_name;

    /**
     * 
     * initialisation de la classe upload!
     * 
     */
    public function __construct($name, $type, $size, $tmp_name)
    {
        $this->name = $name;
        $this->type = $type;
        $this->size = $size;
        $this->upload = false;
        $this->tmp_name = $tmp_name;
    }

    /**
     * 
     * check if it's an actual image
     * 
     * @return bool
     */

    public function is_image() {
        $check = getimagesize($this->tmp_name);
        if($check !== false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * 
     * check if file exists
     * 
     * @return bool
     */

    public function exists() {
        if (file_exists($this->name)) {
            return true;
        } else {
            return false;
        }
    } 


    /**
     * 
     * allowing certain format of images
     * 
     * @return bool
     */

    public function is_allowed() {
        if($this->type != 'jpg' && 
            $this->type != 'jpeg' &&
            $this->type != 'png' &&
            $this->type != 'gif') {
                return false;
            }
        else {
            return true;
        }
    }

    /**
     * 
     * 
     * check if upload is ok
     * 
     * @return bool
     */

    public function is_uploaded() {
        if ($this->upload) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * check the size of the file
     * 
     * @return bool
     */

    public function check_size() {
        if($this->size >= 1000000) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 
     * 
     * try uploading file to the server!
     * 
     * @return bool
     */

    public function try_uploading() {
        if(move_uploaded_file($this->tmp_name, $this->name)) {
            $this->upload = true;
            return true;
        } else {
            $this->upload = false;
            return false;
        }
    }
}