<?php
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR7/pages/logic/import.php");
?>

<?php foreach($errors as $error) :?>
    <div class="container alert alert-danger mt-1"><?=$error?></div>
<?php endforeach ?>

<form method="POST" class="container py-2">

<label for="import">Ссылка на файл</label>
<input type="url" class="form-control my-2" id="import" name="import" placeholder="https://" required>
<button class="btn btn-success">Сохранить</button>

</form>

<?php if (empty($errors) && $_SERVER['REQUEST_METHOD'] === 'POST') :?>
    <div class="container alert alert-success">Импорт данных прошел успешно</div>
<?php endif?>
 
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/footer.php");
?>