<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/logic/logic.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/template/header.php");?>
<div class="container mt-5 d-flex justify-content-center ">
    <table class="table table-bordered text-center">
    <thead class= "bg-dark text-white">
            <tr>
                <th>id</th>
                <th>Оценки</th>
                <th>Студент</th>
                <th>Предмет</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($statement3 as $row): ?>
        <tr>
            <td><?= $row['grade_id'] ?></td>
            <td><?= $row['grade'] ?></td>
            <td><?= $row['fullname'] ?>(<?= $row['student_id'] ?>)</td>
            <td><?= $row['subject_name'] ?>(<?= $row['subject_id'] ?>)</td>
            <td>
                <a href="grade_update.php?id=<?= $row['grade_id'] ?>" class="btn btn-primary d-inline-block me-2">Редактировать</a>
                <form action="" method="POST" class="d-inline-block">
                    <input type="hidden" name="id" value="<?= $row['grade_id'] ?>">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
    </table>
   
</div>
<div class="container mt-1 d-flex justify-content-left ">
       <a href="create_grade.php" class="btn btn-primary ">Создать</a>
            </div>