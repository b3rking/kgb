<?php

namespace src\helper;


/**
 * 
 * class pour gerer les sessions
 * 
 * @package src/helper
 * @author b3rking
 */



class SessionManager {

    /**
     * 
     * va nous permettre de creer des session
     * 
     * @param string $name le nom de la session
     * @param string $value la valeur a utiliser
     * @return bool
     */

    public function setSession($name, $value) : bool
    {
        if($_SESSION[$name] = $value) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * 
     * va nous permettre d'avoir la valeur des sessions
     * 
     * @param string $name le nom de la session
     * @return string
     */


    public function getSession($name): string
    {
        if (isset($_SESSION) && !empty($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return "not set";
        }
    }
    

    /**
     * 
     * va nous permettre de mettre a jour une session
     * 
     * @param string $name le nom de la session
     * @param string $value la valeur a utiliser
     * @return bool
     */


    public function updateSession($name, $value): bool
    {
        if($_SESSION[$name] = $value) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * 
     * va nous permettre de supprimer les sessions
     * @return bool
     */
    
    public function deleteSession(): bool
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();

        return true;
    }
}