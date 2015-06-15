<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsersController extends Controller {

    public function index() {
        $this->load->redirect('/webcrowd/users/login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $user = new User('users');
            $user = $user->find($_POST['email'], 'email');

            if ($user && Cypher::comparePassword($_POST['password'], $user->salt, $user->password)) {
                unset($user->salt);
                unset($user->password);
                Auth::create($user);
                $this->load->redirect('/webcrowd/comments/index');
            } else {
                $this->load->redirect('/webcrowd/users/login', array(
                    'message' => 'Usuário ou senha incorretos.'
                ));
            }

        } else {
            $this->load->view('template/header');
            $this->load->view('users/login');
            $this->load->view('template/footer');
        }

    }

    public function logout() {
        Auth::destroy();
        $this->load->redirect('/webcrowd/users/login');
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $user = new User('users');
            if($user->find($_POST['email'],'email')){
                $message = 'Esse email já foi cadastrado.';
            } else {
                $user->username = $_POST['username'];
                $user->email = $_POST['email'];
                $user->salt = Cypher::generateSalt($user->email);
                $user->password = Cypher::hashedPassword($_POST['password'], $user->salt);
                if ($user->create()) {
                    $message = 'Usuário cadastrado com sucesso. Faça login.';
                } else {
                    $message = 'Não foi possível cadastrar o usuário.';
                }
            }
            $this->load->redirect('/webcrowd/users/login', array(
                'message' => $message
            ));
        } else {
            $this->load->data(array(
                'title' => 'Cadastrar Usuário'
            ));
            $this->load->view('template/header');
            $this->load->view('users/signup');
            $this->load->view('template/footer');
        }

    }

}