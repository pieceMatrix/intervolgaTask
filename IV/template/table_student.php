<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR3/lo/index.php");
require_once("header");?>
<table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Основной вид съемки</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statement as $row): ?>
                    <?php $row = array_map(fn($value) => !is_null($value) ? htmlspecialchars($value) : '', $row); ?>
                    <tr>
                        <td scope="row"><img src="/LR7/inc/images/get_image.php?img=<?= htmlspecialchars($row['img_path']) ?>" style="max-width: 150px;"></th>
                        <td><?= $row['id'] . ' ' . $row['name'] . ' ' . (isset($row['patronymic']) ? $row['patronymic'] : '') ?></td>
                        <td><?= $row['pname'] ?></td>
                        <td><a href="update_form.php?id=<?=$row['id']?>" class="btn btn-primary">Редактировать</a></td>
                        <!--<td><form><input value ="<?= $row['name']?>" class="btn btn-primary">удалить</input></form></td>
                    </tr>-->
                    <td><input type="button" class="btn btn-primary">" class="btn btn-primary">удалить</input></form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-success my-1" href="/LR7/pages/add_photographer.php">Добавить фотографа</a>
        <button class="btn btn-danger" type="submit">Удалить</button>
    </form>
    
</div>
