<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR3/.core/index.php");
$statment=Database::query('SELECT id.groups, ...');
$statment->execute();//это не надо
GroupTable::get_all();