<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CommentsController extends Controller {

    public function __construct($controller, $action) {
        parent::__construct($controller, $action);
        if (/*$action!='index'&&*/!Auth::isLogged()) {
            $this->load->redirect('/webcrowd/users/login', array(
                'message' => 'Você não possui acesso, faça login.'
            ));
        }
    }

    public function index() {
        $comments = new Comment('comments');
        //var_dump($comments->find(2));
        $this->load->data(array(
            'title' => 'Listagem de Contatos',
            'comments' => $comments->find()
        ));
        $this->load->view('template/header');
        $this->load->view('comments/index');
        $this->load->view('template/footer');
    }

    public function show($id) {
        $comment = new Comment('comments');
        $this->load->data(array(
            'title' => 'Contato',
            'comment' => $comment->find($id)
        ));
        $this->load->view('template/header');
        $this->load->view('comments/show');
        $this->load->view('template/footer');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $comment = new Comment('comments');
            $comment->username = $_SESSION['user']->username;
            $comment->message = $_POST['message'];
            if ($comment->create()) {
                $message = 'Comentário criado com sucesso.';
            } else {
                $message = 'Não foi possível criar o comentário.';
            }
            $this->load->redirect('/webcrowd/comments/index', array(
                'message' => $message
            ));
        } else {
            $this->load->data(array(
                'title' => 'Novo Contato'
            ));
            $this->load->view('template/header');
            $this->load->view('comments/new');
            $this->load->view('template/footer');
        }

    }

    public function edit($id) {
        $comment = new Comment('comments');
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $comment->id = $id;
            $comment->username = $_SESSION['user']->username;
            $comment->message = $_POST['message'];
            if ($comment->update()) {
                $message = 'Comentário alterado com sucesso.';
            } else {
                $message = 'Não foi possível alterar o comentário.';
            }
            $this->load->redirect('/webcrowd/comments/index', array(
                'message' => $message
            ));
        } else {
            $this->load->data(array(
                'title' => 'Edição de Contato',
                'comment' => $comment->find($id)
            ));
            $this->load->view('template/header');
            $this->load->view('comments/edit');
            $this->load->view('template/footer');
        }

    }

    public function delete($id) {
        $comment = new Comment('comments');
        $comment->id = $id;
        if ($comment->destroy()) {
            $message = 'Comentário removido com sucesso.';
        } else {
            $message = 'Não foi possível remover o comentário.';
        }
        $this->load->redirect('/webcrowd/comments/index', array(
            'message' => $message
        ));
    }

}