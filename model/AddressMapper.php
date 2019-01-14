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

    public function addNewAddress(string $city, string $street, string $postcode){
        try {
            $stmt = $this->database->connect()->prepare('insert into mszymanski.address (city, street, postcode) values (:city, :street, :postcode)');
            $stmt->bindParam(':city', $city, PDO::PARAM_STR);
            $stmt->bindParam(':street', $street, PDO::PARAM_STR);
            $stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
            $stmt->execute();


        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}