<?php
require_once "AppController.php";
require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/BookMapper.php';
require_once __DIR__.'/../model/Book.php';
require_once __DIR__.'/../model/OrderMapper.php';
require_once __DIR__.'/../model/Order.php';
class OrderController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function order(){
        $order = unserialize($_SESSION['order']);
        $userEmail = $_SESSION['id'];
        $books = $order->getBooks();

        $bookmapper = new BookMapper();
        $ordermapper = new OrderMapper();

        $orderID = $ordermapper->getNewOrderID();   //ten numer trzeba przypisac ksiazkom

        //teraz tworzymy rzad w Orders
        $ordermapper->createOrderInDB($userEmail, 1);


        foreach ($books as $book) {     //trzeba sprawdzic czy kazda jest dostepna
            $bookName = $book->getName();   //dziala
            $bookId = $bookmapper->getAvaibleBookId($bookName);
            print_r($bookId);

        }
    }
}