<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/crud/test/page/logic.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/crud/template/header.php");

//$table=$_GET('table');
?>
<div class="container mt-5 d-flex justify-content-center ">
	<table class="table table-bordered text-center">
		<thead class= "bg-dark text-white">
		<tr>
			<th>id</th>
			<?php foreach(array_keys($_GET['table']::getFields()) as $field):?>
				<th><?= $field ?></th>
			<?php endforeach ?>
			<th>Действия</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($_GET['table']::getRecords() as $row): ?>
			<tr>
				<td><?= $row['id'] ?></td>
				<?php foreach ($_GET['table']::getFields() as $val): ?>
					<td><?= $row[$val] ?></td>
				<?php endforeach; ?>
				<td>
					<a href="href=table_create.php?action=create_table&table=<?=$_GET['table'] ?>" class="btn btn-primary d-inline-block me-2">Редактировать</a>

					<form action="" method="POST" class="d-inline-block">
						<input type="hidden" name="id" value="<?= $row['id'] ?>">
						<button type="submit" class="btn btn-danger">Удалить</button>
					</form>
				</td>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

</div>
<div class="container mt-1 d-flex justify-content-left ">
	<a href="create_table.php?table=<?= $_GET['table'] ?>&action='create_table'" class="btn btn-primary ">Создать</a>
</div>