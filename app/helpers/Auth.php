<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    public static function create($user) {
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $user;
    }

    public static function isLogged() {
        return isset($_SESSION['logged']) ? $_SESSION['logged'] : false;
    }

    public static function destroy() {
        session_destroy();
    }

}