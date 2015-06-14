<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller {

    protected $controller;
    protected $action;

    public function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
        $this->load = new Loader();
        session_start();
    }

    public function __destruct() {}

}