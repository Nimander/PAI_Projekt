<?php

require_once "AppController.php";
require_once __DIR__.'/../model/BookMapper.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/OrderMapper.php';
require_once __DIR__.'/../model/Order.php';

class SearchController extends AppController{

    public function __construct()
    {
        parent::__construct();
    }

    public function search()
    {
        $mapper = new BookMapper();

        $book = null;

        if ($this->isPost()) {
            $book = $mapper->getBook($_POST['book_title']);         //dostajemy od posta book_title


            $this->render('search', ['name' => [$book->getName()], 'author' => [$book->getAuthor()], 'book_id' => [$book->getId()]]);
        }
        else
             $this->render('search');

    }

    public function add(){      //to jest tylko dodawanie do koszyka, tylko dodaje do $_SESSION
        $bookmapper = new BookMapper();
//        $usermapper = new UserMapper();
//
        $book = $bookmapper->getBook($_SESSION["last_book_name"]);  //teraz mamy ksiazke co zostalo klikniete dodaj do koszyka
//        $user = $usermapper->getUser($_SESSION['id']);
//
//        $order = new Order($user, $book);
//
//        $ordermapper = new OrderMapper($order);
//        $ordermapper->add_order_to_database($book->getId(), $user->getId());
//        die($_SESSION["last_book_name"]);

        //$_SESSION['cart'] = [$_SESSION["last_book_name"]];
        $order = unserialize($_SESSION['order']);
        $order->addBook($book);
        $_SESSION["order"] = serialize($order);

        $this->render('search');

    }

}
