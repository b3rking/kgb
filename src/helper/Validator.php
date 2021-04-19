<?php


namespace src\helper;

/**
 *
 * Class Validator
 *
 * pour valider les inputs
 *
 * @package src\helper
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
     * @return array
     *
     */

    public function Username(string $username):array
    {
        $error = [];
        if (isset($username)) {
            if(strlen($username) < 5 && strlen($username) > 20) {
                $error = ['error' => 'username require 5 caracters and less than 20 caracters'];
            }
        } else {
            $error = ['error' => 'no username entered'];
        }
        return $error;
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
}