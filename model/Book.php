<?php

class Book
{
    private $id;
    private $name;
    private $author;
    private $inmagazine;

     public function __construct($id, $name, $author, $inmagazine)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->inmagazine = $inmagazine;
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

    public function getInmagazine()
    {
        return $this->inmagazine;
    }

    public function setInmagazine($inmagazine): void
    {
        $this->inmagazine = $inmagazine;
    }


}