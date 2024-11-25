<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/index.php');
var_dump($_POST['name']);
$groups = new Group();
$groups->updateRecords($_GET['id'], [$_POST['name'],]);// это массив
$student = new Group();
$student->updateRecords($_GET['id'], [$_POST['id_group'], $_POST['fullname'],]);// это массив