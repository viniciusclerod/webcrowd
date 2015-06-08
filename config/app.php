<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('BASEURL', 'webcrowd');
define('DEFAULT_CONTROLLER', 'comments');
define('DEFAULT_ACTION', 'index');
define('PDO', serialize(array (
    'sdn' => 'mysql:host=localhost;dbname=webcrowd',
    'username' => 'root',
    'password' => 'root')));