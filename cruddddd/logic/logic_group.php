<?php
$groups = new Group();
$massage='';
if(isset($_POST['name'])){
	$groups->createRecords([$_POST['name']]);
	$massage='Группа создана!';
}
//костыль
if(isset($_POST['delete_id'])){
	$groups->deleteRecord($_POST['delete_id']);
	$massage='Группа' . $_POST['delete_id'] . ' удалена!';
}