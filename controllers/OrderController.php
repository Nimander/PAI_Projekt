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

class OrderController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function order()
    {
        $addressmapper = new AddressMapper();
        //odebranie adresu z posta
        $addressID = $addressmapper->getNewAddressID();
        // print_r($_POST['City']);                      //tak sie dostac do poasta
        $addressmapper->addNewAddress($_POST['City'], $_POST['Street'], $_POST['PostCode']);

        //teraz adres jest w bazie


        $order = unserialize($_SESSION['order']);
        $userEmail = $_SESSION['id'];
        $books = $order->getBooks();

        $bookmapper = new BookMapper();
        $ordermapper = new OrderMapper();

        $orderID = $ordermapper->getNewOrderID();   //ten numer trzeba przypisac ksiazkom

        //teraz tworzymy rzad w Orders
        $ordermapper->createOrderInDB($userEmail, $addressID);


        foreach ($books as $book) {     //trzeba sprawdzic czy kazda jest dostepna
            $bookName = $book->getName();   //dziala
            $bookId = $bookmapper->getAvaibleBookId($bookName);
            $bookmapper->setOrderNrToBook($bookId, $orderID);

        }
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}/pai_projekt/?page=index");
    }

    public function address()
    {
        $this->render('address');
    }

    public function orders()
    {
        $ordermapper = new OrderMapper();
        $orders = array();

        $ordermapper->getOrders($_SESSION['id']);
        $this->render('historyOfOrders');
    }
}