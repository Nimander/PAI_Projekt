<?php

require_once "AppController.php";
require_once __DIR__.'/../model/BookMapper.php';

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
    public function add(){
        $mapper = new BookMapper();
        $book = $book = $mapper->getBook($_SESSION["last_book_name"]);
        die($book->getAuthor());                                        //teraz
    }

}
