<?php
if(isset($_POST['id_group'])){
	require_once($_SERVER['DOCUMENT_ROOT'] . '/logic/logic_rating.php');
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/logic/logic.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/template/header.php");?>

<form action="" method="POST" class="row">
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

		<button type="submit" class="btn btn-primary">Построить рейтинг</button>
	</form>
<?php

if(isset($_POST['id_group'])){
// Массив заголовков таблицы
$headers = ["id", "Оценки", "Студент", "Предмет", "Действия"];
?>

<table class="table table-bordered text-center">
    <thead class="bg-dark text-white">
        <tr>
            <!-- Динамическое создание заголовков -->
            <?php foreach ($stm2 as $header): ?>
                <th><?= htmlspecialchars($header['name']) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <!-- Динамическое создание строк таблицы -->
        <?php foreach ($stm1 as $row): ?>
            <tr>
				<th scope="row"<?= htmlspecialchars($row['fullname']) ?>"</th>
		<?php foreach ($stm3 as $col): ?>
                <td><?= htmlspecialchars($col['sum']) ?></td>
		<?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
	<?php } ?>

