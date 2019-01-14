<?php

require_once('controllers/DefaultController.php');
require_once('controllers/SearchController.php');
require_once('controllers/CartController.php');
require_once('controllers/OrderController.php');
require_once('controllers/RegisterController.php');
class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],
            'search' => [
                'controller' => 'SearchController',
                'action' => 'search'
            ],
            'add' => [
                'controller' => 'SearchController',
                'action' => 'add'
            ],
            'cart' => [         //pokaze liste ksiazek w koszyku
                'controller' => 'CartController',
                'action' => 'cart'
            ],
            'address' => [
                'controller' => 'OrderController',
                'action' => 'address'
            ],
            'order' =>[
                'controller' => 'OrderController',
                'action' => 'order'
            ],
            'orders' => [
                'controller' => 'OrderController',
                'action' => 'orders'
            ],
            'register' => [
                'controller' => 'DefaultController',
                'action' => 'register'
            ]




        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
        && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'login';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}