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
    private $size;
    private $is_uploaded;
    private $destination;

    /**
     * 
     * initialisation de la classe upload!
     * 
     */
    public function __construct($name, $size, $destination)
    {
        $this->name = $name;
        $this->size = $size;
        $this->destination = $destination;
    }
}