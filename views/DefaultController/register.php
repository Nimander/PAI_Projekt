<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>
<ul class="blue" >
    <li><a href="?page=index" title="" class="current"><span>Strona główna</span></a></li>
    <li><a href="?page=search" title=""><span>Wyszukaj</span></a></li>
    <li><a href="#" title=""><span>O nas</span></a></li>
    <li><a href="#" title=""><span>Regulamin</span></a></li>
    <li><a href="?page=login" title=""><span>Zaloguj się</span></a></li>
    <li><a href="?page=register" title=""><span>Załóż konto</span></a></li>
</ul>
<br><br><br><br><br>

<div clas="row">
    <div class="col-sm-3 offset-sm-0">
        <h1>Zarejestruj się</h1>
        <hr>
        <?php if(isset($message)): ?>
            <?php foreach($message as $item): ?>
                <div><?= $item ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <form action="?page=register" method="POST">
            <div class="form-group row">
                <label for="inputName" class="col-sm-1 col-form-label">
                    <i class="material-icons md-48"></i>
                </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="name" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSurname" class="col-sm-1 col-form-label">
                    <i class="material-icons md-48"></i>
                </label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="surname" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-1 col-form-label">
                    <i class="material-icons md-48"></i>
                </label>
                <div class="col-sm-11">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email" required/>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-1 col-form-label">
                    <i class="material-icons md-48"></i>
                </label>
                <div class="col-sm-11">
                    <input  name="password" class="form-control" id="inputPassword" placeholder="password" type="password" required/>
                </div>
            </div>
            <input type="submit" value="Zarejestruj się" class="btn btn-primary btn-lg float-right" />
        </form>
    </div>
</div>


</body>
</html>