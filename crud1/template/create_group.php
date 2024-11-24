<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/core/index.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/crud/template/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/crud/logic/logic_group.php");?>

<nav aria-label="breadcrumb" class = "bg-gray">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Группы</a></li>
    <li class="breadcrumb-item active" aria-current="page">Новая запись</li>
  </ol>
</nav> 


   <div class= "container mt-5 d-flex justify-content-center ">
    <form action="" method="POST" class= "row">
    <label for="name-iput">Введите имя</label>
    <input id="name-input"  type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" required>
    <div> <button type="submit" class="btn btn-primary">Создать</button></div>
   
    </form>
    <div class=" row alert alert-success" role="alert ">
    <?=$massage ?>
    </div>
    </div>