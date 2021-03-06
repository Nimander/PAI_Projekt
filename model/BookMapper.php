<?php

require_once 'Book.php';
require_once __DIR__ . '/../Database.php';

class BookMapper
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getBook(string $name): Book
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM mszymanski.book WHERE name = :name;');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();

            $book = $stmt->fetch(PDO::FETCH_ASSOC);

            return new Book($book['id'], $book['name'], $book['author'], $book['price']);
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }



    public function getAvaibleBookId(string $name): int
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT min(book_eg.id) FROM mszymanski.book_eg join mszymanski.book on book_eg.bookID = book.id and book.name like :name and book_eg.orderID is null;');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            $book_eg = $stmt->fetch(PDO::FETCH_ASSOC);


            return $book_eg['min(book_eg.id)'];
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function setOrderNrToBook(int $bookID, int $orderID)
    {
        print_r("a");
        $stmt = $this->database->connect()->prepare('update mszymanski.book_eg set book_eg.orderID = :orderID where book_eg.id = :bookID');
        $stmt->bindParam(':bookID', $bookID, PDO::PARAM_STR);
        $stmt->bindParam(':orderID', $orderID, PDO::PARAM_STR);
        $stmt->execute();
    }

}