<?php
include($_SERVER['DOCUMENT_ROOT'] . '/LR7/components/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] .  '/LR7/.core/index.php');

if (isset($_GET['success']) && $_GET['success'] == 'y' && isset($_SESSION['USER_ID'])) {
    header("Location: /LR7/pages/index.php");
    die();
}
?>

<div class="container mt-3">

    <?php foreach(UserActions::signUp() as $err): ?>
        <div class="alert alert-danger"><?=$err?></div>
    <?php endforeach; ?>
    <form method="post" action="">
        <input value="signup" name="action" hidden>
        <input <?= !empty($_POST['email']) ? 'value="' . $_POST['email']. '"' : ''; ?> name="email" class="my-2 form-control" placeholder="Введите почту" type="email">
        <input <?= !empty($_POST['full_name']) ? 'value="' . $_POST['full_name']. '"' : ''; ?> name="full_name" class="my-2 form-control" placeholder="Введите ФИО" type="text">
        <div class="group-form">
            <label>Введите дату рождения:</label>
            <input <?= !empty($_POST['birth_date']) ? 'value="' . $_POST['birth_date']. '"' : ''; ?> name="birth_date" class="my-2 form-control" type="date">
        </div>
        Выберите свой пол
        <input value="male" id="radio-male" class="my-2 form-check-input" type="radio" name="gender" checked>
        <label for="radio-male">Мужской</label>
        <input value="female" id="radio-female" class="my-2 form-check-input" type="radio" name="gender">
        <label for="radio-female">Женский</label>
        <textarea <?= !empty($_POST['interests']) ? 'value="' . $_POST['interests']. '"' : ''; ?> name="interests" class="my-2 form-control" placeholder="Введите свои интересы"></textarea>
        <input name="vk" class="my-2 form-control" placeholder="Введите ссылку на профиль вконтакте">
        Выберите свою группу крови
        <select name="blood_type" class="my-2 form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        Выберите свой резус-фактор
        <input value="+" id="radio-rhesus-positive" class="my-2 form-check-input" type="radio" name="factor" checked>
        <label for="radio-rhesus-positive">+</label>
        <input value="-" id="radio-rhesus-negative" class="my-2 form-check-input" type="radio" name="factor">
        <label for="radio-rhesus-negative">-</label>
        <div class="form-group">
            <input class="form-control mb-2" type="password" name="password" placeholder="Введите пароль">
            <input class="form-control" type="password" name="password_confirm" placeholder="Подтвердите пароль">
        </div>
        <button type="submit" class="btn btn-success w-100 my-3">Зарегистрироваться</button>
    </form>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/LR7/components/footer.php');?>