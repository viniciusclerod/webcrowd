<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller {

    protected $controller;
    protected $action;

    function __construct($controller, $action) {
        $this->controller = $controller;
        $this->action = $action;
        #var_dump($this);
    }

    function __destruct() {}

}