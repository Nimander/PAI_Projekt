<?php

require_once "AppController.php";

class CartController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function cart()
    {
        $this->render('cart');

    }
}