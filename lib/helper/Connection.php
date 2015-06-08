<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Connection {

    private static $instance;

    private function __construct() {
        try {
            $pdo = unserialize(PDO);
            self::$instance = new PDO( $pdo['sdn'], $pdo['username'], $pdo['password']);
            self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            exit('Connection Error: ' . $e->getMessage());
        }
    }

    public static function get() {
        if (!self::$instance) {
            new Connection();
        }
        return self::$instance;
    }

}