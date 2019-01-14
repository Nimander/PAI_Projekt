<?php

class OrderToList
{
    private $books;
    private $number;

    /**
     * OrderToList constructor.
     * @param $books
     * @param $number
     */
    public function __construct($books, $number)
    {
        $this->books = $books;
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param mixed $books
     */
    public function setBooks($books): void
    {
        $this->books = $books;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }


}