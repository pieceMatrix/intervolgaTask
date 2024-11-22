<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');
?>

<form method="post" class="container" enctype="multipart/form-data">
    <label for="profile-input">Добавьте фото профиля</label>
    <input id="profile-input" class="form-control my-1" type="file" name="profile" required>
    <label for="surname-iput">Введите фамилию</label>
    <input id="surname-input" class="form-control my-1" type="text" name="surname" value="<?= isset($photographer['surname']) ? $photographer['surname'] : '' ?>" required>
    <label for="name-iput">Введите имя</label>
    <input id="name-input" class="form-control my-1" type="text" name="name" value="<?= isset($photographer['name']) ? $photographer['name'] : '' ?>" required>
    <label for="patronymic-iput">Введите отчество (при наличии)</label>
    <input id="patronymic-input" class="form-control my-1" type="text" name="patronymic" value="<?= isset($photographer['patronymic']) ? $photographer['patronymic'] : '' ?>" required>
    <label for="biography-input">Введите биографию</label>
    <textarea id="biography-input" class="form-control my-1" name="biography" required><?= isset($photographer['biography']) ? $photographer['biography'] : '' ?></textarea>
    <label for="birth-year-input">Введите год рождения</label>
    <input id="birth-year-input" class="form-control my-1" type="number" name="birth_year" value="<?= isset($photographer['birth_year']) ? $photographer['birth_year'] : '' ?>" required>
    <label for="photo-type-input">Выберите тип съемки</label>
    <select id="photo-type-input" class="form-control my-1" name="id_photo_type">
        <?= PhotoTypesActions::get_options(isset($photographer['id_photo_type']) ? $photographer['id_photo_type'] : 0);?>
    </select>
    <button type="submit" class="btn btn-success my-1">Отправить</button>
</form>