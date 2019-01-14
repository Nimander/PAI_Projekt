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
        <li><a href="?page=logout" title="contact"><span>Wyloguj się</span></a></li>
        <p> zalogowany </p>

    <?php } else {?>
        <li><a href="?page=login" title="blog"><span>Zaloguj się</span></a></li>
        <li><a href="#" title="contact"><span>Załóż konto</span></a></li>
    <?php } ?>
</ul>

<div class="container">
    <div clas="row">
        <div class="col-sm-6 offset-sm-3">
            <h1>Podaj adres</h1>
            <hr>
            <form action="?page=order" method="POST">
                <div class="form-group row">
                    <label for="inputCity" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48"></i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="inputCity" name="City" placeholder="City" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputStreet" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48"></i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="inputStreet" name="Street" placeholder="Street" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPostCode" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48"></i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" name="PostCode"  id="inputPostCode" placeholder="PostCode" required/>
                    </div>
                </div>
                <input type="submit" value="Zamow" class="btn btn-primary btn-lg float-right" />
            </form>
        </div>
    </div>
</div>