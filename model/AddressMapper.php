<?php
require_once 'Address.php';
require_once __DIR__ . '/../Database.php';

class AddressMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getNewAddressID() : int
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT max(address.id) FROM  mszymanski.address');

            $stmt->execute();
            $order = $stmt->fetch(PDO::FETCH_ASSOC);
            if($order['max(address.id)'] == null)
                return 1;
            return $order['max(address.id)'] + 1;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}