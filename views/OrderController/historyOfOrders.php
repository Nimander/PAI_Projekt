<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<body>

<ul class="blue">
    <li><a href="?page=index" title="" class="current"><span>Strona główna</span></a></li>
    <li><a href="?page=search" title=""><span>Wyszukaj</span></a></li>
    <li><a href="#" title=""><span>O nas</span></a></li>
    <li><a href="#" title=""><span>Regulamin</span></a></li>
    <?php
    if(isset($_SESSION) && !empty($_SESSION) && $_SESSION["id"]){   //jezeli nie zalogowany
        ?>
        <li><a href="?page=cart" title=""><span>Koszyk</span></a></li>
        <li><a href="?page=orders" title=""><span>Twoje Zamowienia</span></a></li>
        <li><a href="?page=logout" title=""><span>Wyloguj się</span></a></li>


    <?php } else {?>
        <li><a href="?page=login" title=""><span>Zaloguj się</span></a></li>
        <li><a href="#" title=""><span>Załóż konto</span></a></li>
    <?php } ?>
</ul>
<br>
<br>

<br>
<br>
<b>Twoje zamowione ksiazki</b>
<br>
<br>
<?php

    $orders = unserialize($_SESSION['orders']);
    foreach ($orders as $order) {

        foreach ($order as $book){

            echo "Tytul: ";
            print_r($book['name']);
            echo "<br>Autor: ";
            print_r($book['author']);
            echo"<br>";

        }

        echo "<br>";
    }



?>