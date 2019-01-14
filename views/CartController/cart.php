
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
        <li><a href="?page=order" title="contact"><span>Koszyk</span></a></li>
        <li><a href="?page=logout" title="contact"><span>Wyloguj się</span></a></li>
        <p> zalogowany </p>

    <?php } else {?>
        <li><a href="?page=login" title="blog"><span>Zaloguj się</span></a></li>
        <li><a href="#" title="contact"><span>Załóż konto</span></a></li>
    <?php } ?>
</ul>

<?php
    $order = unserialize($_SESSION['order']);
    $books = $order->getBooks();
echo '<pre>'; print_r($books); echo '</pre>';
    ?>

<form action="?page=order" method="POST">
    <input type="submit" value="dodaj do koszyka" class="btn btn-primary btn-lg float-right" />
</form>
