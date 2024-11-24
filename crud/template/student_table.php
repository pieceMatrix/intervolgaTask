<?php
require_once("/crud/logic/logic.php");
require_once ("/crud/template/header.php");?>
<table class="table text-center heading">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Студент</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statement as $row): ?>
                    <?php //$row = array_map(fn($value) => !is_null($value) ? htmlspecialchars($value) : '', $row); ?>
                    <tr>
						<td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><a href="student_update.php?id=<?=$row['id']?>" class="btn btn-primary">Редактировать</a></td>
                        <!--<td><form><input value ="<?= $row['name']?>" class="btn btn-primary">удалить</input></form></td>
                    </tr>-->
                    <td><input type="button" class="btn btn-primary">" class="btn btn-primary">удалить</input></form></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary my-1" href="/create_student.php">Создать</a>
    </form>
