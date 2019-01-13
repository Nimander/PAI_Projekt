<?php

require_once 'Book.php';
require_once __DIR__.'/../Database.php';

class BookMapper
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getBook(string $name) : Book
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM mszymanski.book WHERE name = :name;');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();

            $book = $stmt->fetch(PDO::FETCH_ASSOC);

            return new Book($book['id'], $book['name'], $book['author'], $book['inmagazine']);
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}