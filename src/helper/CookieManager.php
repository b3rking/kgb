<?php


namespace src\helper;


class CookieManager
{
    /**
     *
     * classe pour gerer les cookies
     *
     * classe qui va creer, mettre a jours, supprimer, et lire des cookies
     *
     * @package src/helper
     * @author b3rking
     */


    /**
     *
     * fonction pour creer un cookie!
     *
     * @param string $name le nom du cookie
     * @param string $value la valeur du cookie
     * @param int $till la durée en jours
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
     * fonction pour lire un cookie!
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
     * fonction pour supprimer un cookie!
     *
     * @param string $name le nom du cookie
     *
     * @return bool
     */

    public function deleteCookie($name):bool
    {
        setcookie($name, "", )
    }
}