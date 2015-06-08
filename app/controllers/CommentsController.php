<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CommentsController extends Controller {

    public function index() {
        $this->load->view('comments/new');
    }

    public function create() {
        $comments = new Comment('comments');
        $comments->username = $_POST['username'];
        $comments->message = $_POST['message'];
        if ($comments->create()) {
            echo 'Criado com sucesso';
        }
    }

}