<?php

require_once "AppController.php";

require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/UserMapper.php';


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Witaj w najlepszej ksigarni';

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {

            $user = $mapper->getUser($_POST['email']);

            if (!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if ($user->getPassword() !== md5($_POST['password'])) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();
                $order = new Order($user);
                $_SESSION["order"] = serialize($order);                         //zaserializowany order
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}/pai_projekt/?page=index");
                exit();
            }
        }

        $this->render('login');
    }


    public function register()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {

            $mapper->addUser($_POST['name'], $_POST['surname'], $_POST['email'], md5($_POST['password']));
        }

        $this->render('register');
    }


    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }
}