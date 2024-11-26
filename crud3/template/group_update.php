


<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/template/header.php");
if(isset($_POST['name']))
{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/logic/logic_update.php');
}

//ФОРМА ДЛЛЯ ПАРАМЕТРОВ ОБНОВЛЕНИЯ?>
<nav aria-label="breadcrumb" class="bg-gray">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="group_table.php">Группы</a></li>
		<li class="breadcrumb-item active" aria-current="page">Запись <?= htmlspecialchars($_GET['id']) ?></li>
	</ol>
</nav>

<form action="" method="POST" class="row">
	<input id="name-input" type="text" name="name" value="<?= isset($_POST['uname']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
	<!-- для студента -->

<div>
	<button type="submit" class="btn btn-primary">Сохранить</button>
</div>


</form>
