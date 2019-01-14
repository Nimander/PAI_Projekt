<?php

require_once 'Book.php';
require_once 'User.php';
class Order{
    private $user;
    private $books = array();

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function addBook($book){
        $this->books[] = $book;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getBooks()
    {
        return $this->books;
    }


}