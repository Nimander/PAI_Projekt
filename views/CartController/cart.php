
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

<br><br><br><br>

Twój koszyk:
<br><br>
<?php
    $order = unserialize($_SESSION['order']);
    $books = $order->getBooks();
    foreach($books as $book){
        echo "Tytuł: ";
        print_r($book->getName());
        echo "<br>Autor:";
        print_r($book->getAuthor());
        echo"<br><br>";
    }
    ?>
<div>

    <div clas="row">
        <div class="col-sm-1 offset-sm-0">
            <form action="?page=address" method="POST">
                <input type="submit" value="Zamów" class="btn btn-primary btn-lg float-right" />
            </form>

        </div>
    </div>
</div>