<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');
//if (!UserLogic::isAuthorized()) {
  //  header("Location: /LR7/authentication/login.php");
    //die();
//} 
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/pages/form.php");
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/pages/photographers.php");
include($_SERVER['DOCUMENT_ROOT'] . "/LR7/components/footer.php");
