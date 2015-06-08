<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ApplicationController extends Controller {

    public function index() {
        $data = array(
            'message' => 'Bem vindo!'
        );
        $this->load->data($data);
        $this->load->view('welcome');
    }

}