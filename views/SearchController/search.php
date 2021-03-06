<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<body>


<ul class="blue" >
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
        <li><a href="#" title="contact"><span>Załóż konto</span></a></li>
    <?php } ?>
</ul>


<br>
<br>
<br><br><br>
<div>

    <div clas="row">
        <div class="col-sm-4 offset-sm-0">
            <h1>Wyszukaj książkę</h1>
            <hr>
            <form action="?page=search" method="POST">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">booooktitle</i>
                    </label>
                    <div class="col-sm-11">
                        <input class="form-control" id="inputEmail" name="book_title" placeholder="book_title" required/>
                    </div>
                </div>
                <input type="submit" value="Szukaj" class="btn btn-primary btn-lg float-right" />
            </form>
        </div>
    </div>
</div>
<br>
<br><br><br>
<div>

    <div clas="row">
        <div class="col-sm-4 offset-sm-0">

            <?php if(isset($name)): ?>
                <?php foreach($name as $item): ?>
                    <?php echo "Tytuł:"?>
                    <?= $item ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if(isset($author)): ?>
                <?php foreach($author as $item): ?>
                    <?php echo "<br>Autor:"?>
                    <?= $item ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if(isset($price)): ?>
                <?php foreach($price as $item): ?>
                    <?php echo "<br>Cena:"?>
                    <?= $item ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(isset($name)): ?>
                <?php foreach($name as $item): ?>
                    <?php $_SESSION["last_book_name"] = $item?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(isset($name)){ ?>
                <form action="?page=add" method="POST">
                    <input type="submit" value="Dodaj do koszyka" class="btn btn-primary btn-lg float-right" />
                </form>
            <?php } ?>

        </div>
    </div>
</div>

</body>
</html>