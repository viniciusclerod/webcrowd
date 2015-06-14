<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loader {

    private $data = array();

    public function __construct() {}

    public function data($data) {
        $this->data = array_merge($this->data, $data);
    }

    public function view($path=null) {
        if(isset($_SESSION['data'])){
            $this->data($_SESSION['data']);
            unset($_SESSION['data']);
        }
        if (is_array($this->data)) {
            extract($this->data);
        }
        if (file_exists(BASEPATH.DS.'app'.DS.'views'.DS.$path.'.html.php')) {
            require_once(BASEPATH.DS.'app'.DS.'views'.DS.$path.'.html.php');
        }
    }

    public function redirect($path, $data=null) {
        if(isset($data)){
            $_SESSION['data'] = $data;
        }
        header('Location: '.$path);
        exit;
    }
}