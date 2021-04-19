<?php


namespace src\classes;


use MongoDB\Driver\Exception\ServerException;

/**
 *
 * Class Auth
 *
 * class pour gerer l'autentication et les autorization!
 * - connecter les utilisateur
 * - deconnecter les utisateur
 * - verifier si un utilisateur est connecté
 * - gerer les autorisation
 *
 * @package src\classes
 * @author b3rking
 *
 */

class Auth
{

    /**
     *
     * @param string $username le nom de l'utilisateur
     *
     * @return bool
     */

    public function login(string $username):bool
    {
        $bool = null;
        $cookie = new CookieManager();
        $session = new SessionManager();
        if($cookie->setCookie('username', $username, 30)) {
            if (isset($_COOKIE['username']) && isset($_COOKIE['user_id'])) {
                $session->setSession('username', $username);
            }
            $bool = true;
        } else {
            $bool = false;
        }

        return $bool;
    }

    /**
     * logout fonction
     *
     * @return bool
     */
    public function logout():void
    {
        $cookie = new CookieManager();
        $session = new SessionManager();

        $cookie->deleteCookie('username');
        $session->deleteSession();
    }


    /**
     *
     * check if user is connected
     *
     * @return bool
     */

    public function is_auth():bool
    {
        if(isset($_COOKIE['username'])) {
            if(!empty($_COOKIE['username'])) {
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
     * methode pour verifier le proprietaire et autorisation
     *
     * @param string $visitor le numero du visiteur de la page personnel
     * @param string $page_owner le numero du proprio
     * @return bool
     *
     *
     */

    public function is_owner(string $visitor, string $page_owner) {
        $bool = null;
        if(isset($visitor) && isset($page_owner)) {
            if($visitor == $page_owner) {
                $bool = true;
            } else {
                $bool = false;
            }
        } else {
            $bool = false;
        }
        return $bool;
    }
}