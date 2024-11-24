<?php
$massage='';
if(isset($_POST['name'])){
    Group::createRecords([$_POST['name']]);
    $massage='Группа создана!';
}
//костыль