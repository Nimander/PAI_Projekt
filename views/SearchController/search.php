<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<body>
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




</body>
</html>