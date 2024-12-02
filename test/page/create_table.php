<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/core/index.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/crud/template/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/crud/logic/logic_group.php");?>


<div class= "container mt-5 d-flex justify-content-center ">
	<nav aria-label="breadcrumb" class = "bg-gray">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="table_read.php?action=read_table&table=Group"><?=$_GET['table'] ?></a></li>
			<li class="breadcrumb-item active" aria-current="page">Новая запись</li>
		</ol>
	</nav>
	<form action="" method="POST" class="row">
		<div class="mb-3">
			<?php $i=0;
			foreach($_GET['table']::getFields() as  $row):
				if ($i == 0):?>
					<label for="exampleInputTextarea" class="form-label">Введите <?=$row ?></label>
					<textarea class="form-control" name="<?=$row?>"><?= isset($_POST[$row]) ? htmlspecialchars($_POST[$row]) : '' ?></textarea>
				<?php $i++; else: ?>
					<label for="exampleSelect" class="form-label">Выберите <?=$row ?></label>
					<select name="<?=$row?>" class="form-control" required>
						<option value="" selected>Выберите <?=$row ?></option>
						<?php foreach(Group::getRecords() as $col): ?>
							<option value="<?= htmlspecialchars($col['id']) ?>"<?= isset($_POST['id_group']) && $_POST['id_group'] == $col['id'] ? 'selected' : '' ?>>
								<?= htmlspecialchars($col[$row]) ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php endif;
			endforeach; ?>
		</div>
		<button type="submit" class="btn btn-primary">Создать</button>
	</form>


	<?php if(isset($massage) && $massage != ''): ?>
	<div class=" row alert alert-success" role="alert">
		<?=$massage ?>
	</div>
<?php endif?>
<?php if(isset($errors) && $errors != ''):
	foreach($errors as $err){
		if(isset($err) && $err != ''):?>
			<div class=" row alert alert-danger" role="alert">
				<?=$err ?>
			</div>
		<?php  endif?>
	<?php } endif?>
</div>
