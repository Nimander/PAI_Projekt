<?php

require_once "AppController.php";
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/UserMapper.php';
require_once __DIR__ . '/../model/BookMapper.php';
require_once __DIR__ . '/../model/Book.php';
require_once __DIR__ . '/../model/OrderMapper.php';
require_once __DIR__ . '/../model/Order.php';
require_once __DIR__ . '/../model/Address.php';
require_once __DIR__ . '/../model/AddressMapper.php';


class RegisterController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register(){
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {

            $user = $mapper->getUser($_POST['email']);

            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if ($user->getPassword() !== $_POST['password']) {
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

        $this->render('register');
    }
}
