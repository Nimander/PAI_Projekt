<?php
require_once 'Order.php';
require_once __DIR__.'/../Database.php';

class OrderMapper{
    private $database;
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
        $this->database = new Database();
    }

    public function add_order_to_database($bookID, $userID){
        try {
            $stmt = $this->database->connect()->prepare('insert into mszymanski.Orders (userID, bookID) values (:userID, :bookID)');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->bindParam(':bookID', $bookID, PDO::PARAM_STR);
            $stmt->execute();



        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

}