<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/index.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/template/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/logic/logic.php");
//if(isset($_GET['id'])){
require_once($_SERVER['DOCUMENT_ROOT'] ."/logic/logic_student.php");
//}
?>
<div class= "container mt-5 d-flex justify-content-center ">
	<nav aria-label="breadcrumb" class = "bg-gray">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="student_table.php">Студенты</a></li>
			<li class="breadcrumb-item active" aria-current="page">Новая запись</li>
		</ol>
	</nav>
	<form action="" method="POST" class="row">
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Введите имя</label>
			<input type="text" class="form-control" name="fullname" value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : 'поста нет' ?>" required>
		</div>

		<label>Выберите группу:</label>
		<select name="ads" class="form-control">
			<option value="" selected>Выберите группу</option>
			<?php foreach($statement as $row): ?>
			<?php var_dump($row['id'])?>
				<option <?= isset($_GET['id_group']) && $_GET['id_group'] == $row['id'] ? 'selected' : '' ?> value="<?= htmlspecialchars($row['name'].'(' .$row['id'].')') ?>">
					<?= htmlspecialchars($row['name']) ?> <!-- Отображаем имя группы -->
				</option>
				<input type="hidden" name="id_group" value="<?= htmlspecialchars($row['id'] ?? '') ?>">
			<?php endforeach; ?>
		</select>



		<button type="submit" class="btn btn-primary">Создать</button>
	</form>

<div class=" row alert alert-success" role="alert">
	<?=$massage ?>
</div>
</div>


