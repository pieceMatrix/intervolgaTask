<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/core/index.php');
Database::updateRecords($_POST['id'], [$_POST[$name],]);// это массив