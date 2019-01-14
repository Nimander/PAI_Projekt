<?php

class Book
{
    private $id;
    private $name;
    private $author;
    private $price;

     public function __construct($id, $name, $author, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }


}