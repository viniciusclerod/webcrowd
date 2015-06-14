<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cypher {

    public static function generateSalt($complement=null) {
        $message = 'New salt generated at '.time();
        if ($complement) {
            $message .= ' for '.$complement;
        }
        return hash('sha256', $message);
    }

    public static function hashedPassword($password, $salt) {
        $message = 'Hashed password '.$password.' with salt '.$salt;
        return hash('sha256', $message);
    }

    public static function comparePassword($password, $salt, $hashedPassword) {
        return self::hashedPassword($password, $salt) === $hashedPassword;
    }

}