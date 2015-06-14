<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends Model {

    public $username;
    public $email;
    public $salt;
    public $password;

}