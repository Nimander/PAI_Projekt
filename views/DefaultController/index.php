<!--<!DOCTYPE html>-->
<!--<html>-->
<!---->
<?php //include(dirname(__DIR__).'/head.html') ?>
<!---->
<!--<body>-->
<!--<body style="background-color: aliceblue">-->
<!--<div class="container">-->
<!--    <h1>HOMEPAGE</h1>-->
<!--    <p>-->
<!--        Witaj w najlepszej ksiegarni na osiedlu-->
<!--    </p>-->
<!--    ////////////////////-->

<!--    /////////////////////-->
<!---->
<!--    --><?php
//    if(isset($_SESSION) && !empty($_SESSION)) {
//        print_r($_SESSION);
//    }
//    ?>
<!---->
<!--    <div class="login_button"><a href="?page=login">Zaloguj sie</a></div>-->
<!--    <div id="yellow" class="register_button">Zarejestruj sie</div>-->
<!--    <div id="turquise" class="static">Static</div>-->
<!--    <div id="blue" class="static">Static</div>-->
<!--    <div id="violet" class="relative">Relative</div>-->
<!--    <div id="orange" class="absolute">Absolute</div>-->
<!--    <div id="red" class="fixed">Fixed</div>-->
<!--    <div id="yellow">Default</div>-->
<!--</div>-->
<!--</body>-->
<!---->
<!--</html>-->

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



</body>
</html>