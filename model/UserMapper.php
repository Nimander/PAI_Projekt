<?php

require_once 'User.php';
require_once __DIR__ . '/../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(string $email): User
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM mszymanski.Users WHERE email = :email;');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return new User($user['id'], $user['name'], $user['surname'], $user['email'], $user['password']);
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function addUser($name, $surname, $email, $password)
    {
        try {
            $pdo = $this->database->connect();
            $stmt = $pdo->prepare('insert into mszymanski.Users (email,password,name,surname) values (:email, :password, :name, :surname)');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();


        } catch (PDOException $e) {

            return 'Error: ' . $e->getMessage();
        }
    }
}