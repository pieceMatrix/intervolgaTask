<?php
$students=new Student();
$massage='';
var_dump($_POST['id_group']);
var_dump($_POST['fullname']);
if(isset($_POST['fullname']) && isset($_POST['id_group'])){

	$students->createRecords([ $_POST['id_group'],$_POST['fullname']]);
	$massage='Студент создан!';
}