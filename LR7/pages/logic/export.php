<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');

$root = $_SERVER['DOCUMENT_ROOT'] . '/LR7/';

$errors = [];
$success = false;

function unset_extra($obj) {
    unset($obj['id']);
    unset($obj['is_deprecated']);
    return $obj;
}

if (isset($_POST['export']) && $_POST['export'] !== '') {
    $url = urldecode($_POST['export']);

    if (str_contains('/', $_POST['export'])) {
        $errors[] = "Неверное имя файла, файл не может быть вложен в новую дирректорию";
    }

    if (!str_ends_with($url, ".json")) {
        $errors[] = "Неверный формат файла";
    }

    $url = "/LR7/upload/$url";

    if (empty($errors)) {
        if (!file_exists($root . "upload")) {
            mkdir($root . "upload");
        }

        $file = fopen($_SERVER['DOCUMENT_ROOT'] . $url, 'w');
        $query = Database::query("SELECT * FROM photographers");
        $query->execute();

        $content = json_encode(array_map('unset_extra', $query->fetchAll(PDO::FETCH_ASSOC)), JSON_UNESCAPED_UNICODE);

        fwrite($file, $content);
        fclose($file);
        $success = true;
    }
}