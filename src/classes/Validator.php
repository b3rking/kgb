<?php


namespace src\classes;

/**
 *
 * Class Validator
 *
 * pour valider les inputs
 *
 * @package src\classes
 * @author b3rking
 *
 */
class Validator
{
    /**
     *
     * methode pour verifier et valider les usernames!
     *
     * @param string $username l'input correspondant au nom d'utilisateur!
     * @return bool
     *
     */

    public function Username(string $username):bool
    {
        $bool = null;
        if (isset($username)) {
            if(strlen($username) > 5 && strlen($username) < 20) {
                $bool = true;
            } else {
                $bool = false;
            }
        }
        return $bool;
    }


    /**
     *
     * methode pour confimer les mot de passe
     *
     * @param string $first_password le premier mot de passe
     * @param string $second_password le second mot de passe
     * @return bool
     *
     */

    public function Password(string $first_password, string $second_password):bool
    {
        $bool = null;
        if(isset($first_password) && isset($second_password))
        {
            if ($first_password == $second_password) {
                $bool = true;
            } else {
                $bool = false;
            }
        }
        return $bool;
    }


    /**
     *
     * methode pour verifier et valider la taille des notes!
     *
     * @param string $body le corp du note!
     * @return bool
     *
     */

    public function noteBody(string $body):bool
    {
        $bool = null;
        if (isset($body)) {
            if(strlen($body) < 1000) {
                $bool = true;
            } else {
                $bool = false;
            }
        }
        return $bool;
    }


    /**
     *
     * methode pour verifier et valider les titre de notes!
     *
     * @param string $title le titre d'une note!
     * @return bool
     *
     */

    public function noteTitle(string $title):bool
    {
        $bool = null;
        if (isset($title)) {
            if(strlen($title) < 200) {
                $bool = true;
            } else {
                $bool = false;
            }
        }
        return $bool;
    }
}