<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/core/index.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/template/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/logic/logic_group.php");?>



   <div class= "container mt-5 d-flex justify-content-center ">
	   <nav aria-label="breadcrumb" class = "bg-gray">
		   <ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="group_table.php">Группы</a></li>
			   <li class="breadcrumb-item active" aria-current="page">Новая запись</li>
		   </ol>
	   </nav>
	   <form action="" method="POST" class= "row">
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Введите имя</label>
			<input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" required>
		</div>
		<button type="submit" class="btn btn-primary">Создать</button></div>
    </form>

    <div class=" row alert alert-success" role="alert">
    <?=$massage ?>
    </div>
</div>

