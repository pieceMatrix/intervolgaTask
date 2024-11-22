<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/pages/logic/export.php');
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/header.php");
?>

<?php foreach($errors as $error) :?>
    <div class="container alert alert-danger mt-1"><?=$error?></div>
<?php endforeach ?>

<form action="" method="POST" class="container py-2">

<label for="export">Имя сохраняемого JSON файла</label>
<input type="text" class="form-control my-2" id="export" name="export" placeholder="export.json" required>
<button class="btn btn-success">Сохранить</button>

</form>

<?php if ($success) :?>
    <div class="container">
        Файл сохранен по ссылке: <a href="/LR7/upload/<?=$_POST['export']?>"><?=$_POST['export']?></a>
    </div>
<?php endif ?>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/footer.php");
?>