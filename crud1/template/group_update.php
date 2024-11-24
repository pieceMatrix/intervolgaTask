


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/logic/logic_update.php');
//ФОРМА ДЛЛЯ ПАРАМЕТРОВ ОБНОВЛЕНИЯ?>
<nav aria-label="breadcrumb" class = "bg-gray">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Группы</a></li>
    <li class="breadcrumb-item active" aria-current="page">Запись <?$_GET['id']?></li>
  </ol>
</nav> 
<input id="name-input"  type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" required>
<!--для студента -->
<input id="name-input"  type="text" name="name" value="<?= isset($_POST['id_student']) ? $_POST['id_student'] : '' ?>" required>