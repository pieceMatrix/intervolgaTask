<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');

if (!UserLogic::isAuthorized()) {
    header("Location: /LR7/authentication/login.php");
    die();
}

header("Content-type: image/jpg");
echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/LR7/inc/images/staff/' . $_GET['img'], true);