<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');

unset($_SESSION['USER_ID']);

header("Location: /LR7/authentication/login.php");
die();