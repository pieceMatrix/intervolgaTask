<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');
?>
<div>
    <?php if (isset($_SESSION['USER_ID'])) : ?>
        <div>Вы вошли как <?=UserTable::get_by_id($_SESSION['USER_ID'])['email']?> <a class="link-dark" href="/LR7/authentication/logout.php">Выход</a></div>
    <?php else : ?>
        <div>Вы не авторизованы</div>
        <div><a class="link-dark" href="/LR7/authentication/login.php">Ввести логин и пароль</a> или <a class="link-dark" href="/LR7/authentication/register.php">зарегистрироваться</a></div>
    <?php endif; ?>
</div>