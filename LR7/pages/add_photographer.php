<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR7/.core/index.php");
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/header.php");

$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/LR7/inc/images/staff/';
$errors = [];
$photographer = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile'])) {
    $photographer = $_POST;
    $new_name = time() . $_FILES['profile']['name'];

    $errors = PhotographerActions::add($new_name);
    if (empty($errors)) {
        move_uploaded_file($_FILES['profile']['tmp_name'], $uploadDir . $new_name);
    }
}
?>
<div class="container">
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger my-2"><?=$error?></div>
    <?php endforeach ?>
    <?php if (empty($errors) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="alert alert-success my-2">Добавление прошло успешно</div>
    <?php endif; ?>
    <?php include($_SERVER["DOCUMENT_ROOT"] . "/LR7/pages/photographers_form.php");?>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/footer.php");
?>