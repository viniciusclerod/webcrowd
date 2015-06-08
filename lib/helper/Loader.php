<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loader {

    private $data;

    public function __construct() {}

    public function data($data) {
        $this->data = $data;
    }

    public function view($path = null ) {
        if (is_array($this->data)) {
            extract($this->data);
        }
        if (file_exists(BASEPATH.DS.'app'.DS.'views'.DS.$path.'.html.php')) {
            require_once(BASEPATH.DS.'app'.DS.'views'.DS.$path.'.html.php');
        }
        exit;
    }
}