<?php
require_once 'Order.php';
require_once __DIR__ . '/../Database.php';

class OrderMapper
{
    private $database;


    public function __construct()
    {

        $this->database = new Database();
    }

    public function add_order_to_database($bookID, $userID)
    {
        try {
            $stmt = $this->database->connect()->prepare('insert into mszymanski.Orders (userID, bookID) values (:userID, :bookID)');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->bindParam(':bookID', $bookID, PDO::PARAM_STR);
            $stmt->execute();


        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getNewOrderID(): int
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT max(Orders.id) FROM  mszymanski.Orders');

            $stmt->execute();
            $order = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($order['max(Orders.id)'] == null)
                return 1;
            return $order['max(Orders.id)'] + 1;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function createOrderInDB($useremail, $addressID)
    {
        try {
            $stmt1 = $this->database->connect()->prepare('SELECT Users.id FROM mszymanski.Users WHERE email = :email;');
            $stmt1->bindParam(':email', $useremail, PDO::PARAM_STR);
            $stmt1->execute();
            $user = $stmt1->fetch(PDO::FETCH_ASSOC);
            $userID = $user['id'];


            $stmt = $this->database->connect()->prepare('insert into mszymanski.Orders (userID, addressID) values (:userID, :addressID)');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->bindParam(':addressID', $addressID, PDO::PARAM_STR);
            $stmt->execute();


        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

//    public function howManyOrdersPerEmail()
//    {
//        try {
//            $stmt = $this->database->connect()->prepare('SELECT count(Orders.id) FROM  mszymanski.Orders where Orders.userID');
//
//            $stmt->execute();
//            $order = $stmt->fetch(PDO::FETCH_ASSOC);
//            if ($order['max(Orders.id)'] == null)
//                return 1;
//            return $order['max(Orders.id)'] + 1;
//        } catch (PDOException $e) {
//            return 'Error: ' . $e->getMessage();
//        }
//    }

    public function getOrders($email)
    {
        try {
            $stmt1 = $this->database->connect()->prepare('SELECT Users.id FROM mszymanski.Users WHERE email = :email;');
            $stmt1->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt1->execute();
            $user = $stmt1->fetch(PDO::FETCH_ASSOC);
            $userID = $user['id'];


            $stmt = $this->database->connect()->prepare('SELECT * FROM  mszymanski.Orders where userID = :userID ');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->execute();
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $ordersList = array();
            foreach ($orders as $order) {
                //trzeba pobrac ksiazki
                $books = [];
                $orderID = $order['id'];
                //print_r($orderID);
                $stmt2 = $this->database->connect()->prepare('SELECT book.name, book.author FROM book, book_eg where book_eg.orderID = :orderID and book_eg.bookID = book.id  ');
                $stmt2->bindParam(':orderID', $orderID, PDO::PARAM_STR);

                $stmt2->execute();
                $orders2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                $ordersList[] = $orders2;



                //$ordersList[] = new OrderToList()

            }
            $_SESSION['orders'] = serialize($ordersList);





        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }


}