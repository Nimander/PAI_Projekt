<?php
require_once "AppController.php";

class OrderController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function order(){
        $order = unserialize($_SESSION['order']);
        //teraz magia w bazie danych
    }
}