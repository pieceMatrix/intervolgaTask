<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/logic/logic.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/template/header.php");
if(isset($_POST['id'])){
	$_POST['delete_id']=$_POST['id'];
	require_once($_SERVER['DOCUMENT_ROOT'] . '/logic/logic_group.php');
}
?>
<div class="container mt-5 d-flex justify-content-center ">
    <table class="table table-bordered text-center">
        <thead class= "bg-dark text-white">
            <tr >
                <th>id</th>
                <th>Группа</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statement as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td>
                        <a href="group_update.php?id=<?= $row['id'] ?>" class="btn btn-primary d-inline-block me-2">Редактировать</a>

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
       <a href="create_group.php" class="btn btn-primary ">Создать</a>
            </div>