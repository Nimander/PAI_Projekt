<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<body>


<ul class="blue" >
    <li><a href="?page=index" title="home" class="current"><span>Strona główna</span></a></li>
    <li><a href="?page=search" title="products"><span>Wyszukaj</span></a></li>
    <li><a href="#" title="contact"><span>O nas</span></a></li>
    <li><a href="#" title="contact"><span>Regulamin</span></a></li>
    <?php
    if(isset($_SESSION) && !empty($_SESSION) && $_SESSION["id"]){   //jezeli nie zalogowany
        ?>
        <li><a href="?page=logout" title="contact"><span>Wyloguj się</span></a></li>
        <p> zalogowany </p>

    <?php } else {?>
        <li><a href="?page=login" title="blog"><span>Zaloguj się</span></a></li>
        <li><a href="#" title="contact"><span>Załóż konto</span></a></li>
    <?php } ?>
</ul>
<br>
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



<?php if(isset($name)): ?>
    <?php foreach($name as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>
<?php if(isset($author)): ?>
    <?php foreach($author as $item): ?>
        <div><?= $item ?></div>
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



</body>
</html>