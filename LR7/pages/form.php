<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/LR7/pages/logic/logic.php")?>
<div class="container">
    <div class="row">
    <a href="/LR7/pages/export.php" class="col btn btn-success m-1">Экспорт</a>
    <a href="/LR7/pages/import.php" class="col btn btn-success m-1">Импорт</a>
    </div>
    <form action="" method="get" class="text-center">
        <h2>Фильтрация результата поиска</h2>
        <div class="form-group">
            <label>По году рождения:</label>
            <input <?= set_query_values('birth-year-from') ?> class="my-2 form-control" type="text" placeholder="Год рождения от" name="birth-year-from">
            <input <?= set_query_values('birth-year-to') ?> class="form-control" type="text" placeholder="Год рождения до" name="birth-year-to">
        </div>
        <div class="form-group">
            <label>Фильтрация по типу съемки:</label>
            <select value="1" class="form-control" name="photo-type">
                <option value="">Выберите тип съемки</option>
                <?= get_options($pdo, isset($_GET['photo-type']) ? $_GET['photo-type'] : '') ?>
            </select>
        </div>
        <div class="form-group">
            <label>Фильтрация по биографии:</label>
            <textarea class="form-control" placeholder="Введите биогрифию фотографа" name="biography"><?= isset($_GET['biography']) ? $_GET['biography'] : ''; ?></textarea>
        </div>
        <div class="form-group mb-2">
            <label>Фильтрация по фамилии:</label>
            <input <?= set_query_values('surname') ?> class="form-control" type="text" placeholder="Введите фамилию фотографа" name="surname">
        </div>
        <button type="submit" class="btn btn-primary">Применить фильтр</button>
        <a href="index.php" class="btn btn-danger">Очистить фильтр</a>
    </form>
</div>