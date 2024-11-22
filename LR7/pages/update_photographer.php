<?php
include($_SERVER['DOCUMENT_ROOT'] . '/LR7/components/header.php');

if (!isset($_GET['id']) || !($photographer = PhotographerActions::get_by_id($_GET['id']))) {
    header('Location: /LR7/pages/index.php');
    die();
}

if (isset($_POST['surname'])) {
    $photographer['surname'] = $_POST['surname'];
}
if (isset($_POST['name'])) {
    $photographer['name'] = $_POST['name'];
}
if (isset($_POST['patronymic'])) {
    $photographer['patronymic'] = $_POST['patronymic'];
}
if (isset($_POST['biography'])) {
    $photographer['biography'] = $_POST['biography'];
}
if (isset($_POST['birth_year'])) {
    $photographer['birth_year'] = $_POST['birth_year'];
}
if (isset($_POST['id_photo_type'])) {
    $photographer['id_photo_type'] = $_POST['id_photo_type'];
}

$errors = [];
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/LR7/inc/images/staff/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile'])) {
    $new_name = time() . $_FILES['profile']['name'];

    $errors = PhotographerActions::update($_GET['id'], $new_name);
    if (empty($errors)) {
        move_uploaded_file($_FILES['profile']['tmp_name'], $uploadDir . $new_name);
        if (file_exists($uploadDir . $photographer['img_path'])) {
            unlink($uploadDir . $photographer['img_path']);
        }
    }
}

?>
<div class="container">
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger my-2"><?=$error?></div>
    <?php endforeach ?>
    <?php if (empty($errors) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="alert alert-success my-2">Обновление прошло успешно</div>
    <?php endif; ?>
    <?php include($_SERVER["DOCUMENT_ROOT"] . "/LR7/pages/photographers_form.php");?>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/LR7/components/footer.php');