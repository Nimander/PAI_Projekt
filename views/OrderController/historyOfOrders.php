<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<body>

<ul class="blue">
    <li><a href="?page=index" title="home" class="current"><span>Strona główna</span></a></li>
    <li><a href="?page=search" title="products"><span>Wyszukaj</span></a></li>
    <li><a href="#" title="contact"><span>O nas</span></a></li>
    <li><a href="#" title="contact"><span>Regulamin</span></a></li>
    <?php
    if(isset($_SESSION) && !empty($_SESSION) && $_SESSION["id"]){   //jezeli nie zalogowany
        ?>
        <li><a href="?page=cart" title="contact"><span>Koszyk</span></a></li>
        <li><a href="?page=orders" title="contact"><span>Twoje Zamowienia</span></a></li>
        <li><a href="?page=logout" title="contact"><span>Wyloguj się</span></a></li>


    <?php } else {?>
        <li><a href="?page=login" title="blog"><span>Zaloguj się</span></a></li>
        <li><a href="#" title="contact"><span>Załóż konto</span></a></li>
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