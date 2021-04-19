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
     * @param int $user_id le numero de l'utilisateur
     * @return bool
     */

    public function login(string $username, int $user_id):bool
    {
        $bool = null;
        $cookie = new CookieManager();
        $session = new SessionManager();
        if($cookie->setCookie('username', $username, 30)) {
            $cookie->setCookie('useru_id', $user_id, 30);
            if (isset($_COOKIE['username']) && isset($_COOKIE['user_id'])) {
                $session->setSession('username', $_COOKIE['username']);
                $session->setSession('user_id', $_COOKIE['user_id']);
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
    public function logout():bool
    {
        $cookie = new CookieManager();
        $session = new SessionManager();

        if($cookie->deleteCookie('username') && $cookie->deleteCookie('user_id'))
        {
            if ($session->deleteSession()) {
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
     * check if user is connected
     *
     * @return bool
     */

    public function is_auth():bool
    {
        if(isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
            if(!empty($_SESSION['username']) && !empty($_SESSION['user_id'])) {
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
     * @param int $visitor le numero du visiteur de la page personnel
     * @param int $page_owner le numero du proprio
     * @return bool
     *
     *
     */

    public function is_owner(int $visitor, int $page_owner) {
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