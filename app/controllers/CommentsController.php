<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CommentsController extends Controller {

    public function index() {
        $comments = new Comment('comments');
        //var_dump($comments->find(2));
        $this->load->data(array(
            'comments' => $comments->find()
        ));
        $this->load->view('comments/index');
    }

    public function show($id) {
        $comment = new Comment('comments');
        //var_dump($comment->find($id));
        $this->load->data(array(
            'comment' => $comment->find($id)
        ));
        $this->load->view('comments/show');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $comment = new Comment('comments');
            $comment->username = $_POST['username'];
            $comment->message = $_POST['message'];
            if ($comment->create()) {
                echo '<span class="alert">Criado com sucesso.</span>';
            } else {
                echo '<span class="alert">Não foi possível comentar.</span>';
            }
            $this->index();
        } else {
            $this->load->view('comments/new');
        }

    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            // editar
        } else {
            $comment = new Comment('comments');
            $this->load->data(array(
                'comment' => $comment->find($id)
            ));
            $this->load->view('comments/edit');
        }

    }

    public function delete($id) {
        $comment = new Comment('comments');
        $comment->id = $id;
        if ($comment->destroy()) {
            echo '<span class="alert">Removido com sucesso.</span>';
        } else {
            echo '<span class="alert">Não foi possível remover!</span>';
        }
        $this->index();
    }

}