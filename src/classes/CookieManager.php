<?php


namespace src\classes;


class CookieManager
{
    /**
     *
     * classe pour gerer les cookies
     *
     * classe qui va creer, mettre a jour, supprimer, et lire des cookies
     *
     * @package src/classes
     * @author b3rking
     */


    /**
     *
     * methode pour creer un cookie!
     *
     * @param string $name le nom du cookie
     * @param string $value la valeur du cookie
     * @param int $till la validité en jours
     * @return bool
     */


    public function setCookie(string $name, string $value, int $till):bool
    {
        if (isset($name) && isset($value) && isset($till))
        {
            if (!empty($name) && !empty($till) && !empty($value))
            {
                setcookie($name, $value, time() + (86400 * $till), '/');
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     *
     * methode pour lire un cookie!
     *
     * @param string $name le nom du cookie
     *
     * @return string
     */

    public function getCookie(string $name): string
    {
        if(isset($_COOKIE[$name]) && !empty($_COOKIE[$name])) {
            return $_COOKIE[$name];
        } else {
            return "not set";
        }
    }


    /**
     *
     * methode pour supprimer un cookie!
     *
     * @param string $name le nom du cookie
     *
     * @return bool
     */

    public function deleteCookie(string $name):bool
    {
        setcookie($name, "", time() - 3600);
        unset($_COOKIE[$name]);
        return true;
    }
}