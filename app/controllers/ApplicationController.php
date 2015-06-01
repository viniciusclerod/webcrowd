<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ApplicationController extends Controller {

    public function index($param1, $param2) {
        echo 'Welcome!';
        var_dump($param1);
        var_dump($param2);
    }

    public function test() {
        echo 'funciona';
    }

}