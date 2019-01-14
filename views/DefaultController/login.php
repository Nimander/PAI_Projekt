<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>
<ul class="blue" >
    <li><a href="?page=index" title="home" class="current"><span>Strona główna</span></a></li>
    <li><a href="?page=search" title="products"><span>Wyszukaj</span></a></li>
    <li><a href="#" title="contact"><span>O nas</span></a></li>
    <li><a href="#" title="contact"><span>Regulamin</span></a></li>
    <li><a href="?page=login" title="blog"><span>Zaloguj się</span></a></li>
    <li><a href="#" title="contact"><span>Załóż konto</span></a></li>
</ul>
<br><br><br><br><br>

    <div clas="row">
        <div class="col-sm-3 offset-sm-0">
            <h1>LOGIN</h1>
            <hr>
            <?php if(isset($message)): ?>
                <?php foreach($message as $item): ?>
                    <div><?= $item ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="?page=login" method="POST">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">email</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password" type="password" required/>
                    </div>
                </div>
                <input type="submit" value="Zaloguj się" class="btn btn-primary btn-lg float-right" />
            </form>
        </div>
    </div>


</body>
</html>