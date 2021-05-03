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
     */

    private $name;
    private $size;
    private $is_uploaded;
    private $destination;


    public function __construct()
    {
        // initialisation of the classsssssss....................       
    }
}