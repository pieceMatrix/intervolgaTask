<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/LR7/pages/logic/logic.php") ?>
<div class="container mt-3">
    <form method="post" action="logic/delete_photographers.php">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Фото</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Основной вид съемки</th>
                    <th scope="col">Краткая биография</th>
                    <th scope="col">Год рождения</th>
                    <th scope="col"></th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statement as $row): ?>
                    <?php $row = array_map(fn($value) => !is_null($value) ? htmlspecialchars($value) : '', $row); ?>
                    <tr>
                        <th scope="row"><img src="/LR7/inc/images/get_image.php?img=<?= $row['img_path'] ?>" style="max-width: 150px;"></th>
                        <td><?= $row['surname'] . ' ' . $row['name'] . ' ' . (isset($row['patronymic']) ? $row['patronymic'] : '') ?></td>
                        <td><?= $row['photo_type'] ?></td>
                        <td><?= $row['biography'] ?></td>
                        <td><?= $row['birth_year'] ?></td>
                        <td><a href="update_photographer.php?id=<?=$row['id']?>" class="btn btn-success">Редактировать</a></td>
                        <td><input type="checkbox" value="<?= $row['id'] ?>" name="delete-photographers[]"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success my-1" href="/LR7/pages/add_photographer.php">Добавить фотографа</a>
        <button class="btn btn-danger" type="submit">Удалить</button>
    </form>
    
</div>