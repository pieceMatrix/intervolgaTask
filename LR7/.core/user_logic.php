<?php


class UserLogic
{
    public static function signUp(
        string $email,
        string $full_name,
        string $birth_date,
        string $gender,
        string $interests,
        int $blood_type,
        string $factor,
        string $vk,
        string $password1,
        string $password2
    ): array {

        $errors = [];

        if (empty($full_name)) {
            $errors[] = "Введите имя";
        }

        if (empty($birth_date)) {
            $errors[] = "Введите дату рождения";
        }

        if (empty($gender)) {
            $errors[] = "Введите пол";
        }

        if (empty($interests)) {
            $errors[] = "Введите интересы";
        }

        if (empty($blood_type)) {
            $errors[] = "Введите группу крови";
        }

        if (empty($factor)) {
            $errors[] = "Введите резус-фактор";
        }

        if (empty($password1) || empty($password2)) {
            $errors[] = "Введите пароль";
        }

        if (UserTable::get_by_email($email) !== null) {
            $errors[] = "Пользователь с данным email уже зарегистрирован";
        }

        if (empty($email)) {
            $errors[] = "Введите email";
        }
        elseif (!preg_match("/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
            $errors[] = "email невалиден";
        }

        if ($password1 !== $password2) {
            $errors[] = "Пароли не совпадают";
        }

        if (!preg_match("/([\w@#&-+()\/*\"':;!?]| ){7,}/", $password1) || !preg_match('/[a-z]/', $password1) || !preg_match('/[A-Z]/', $password1) || !preg_match('/[@#&+()\/*"\':;!?]/', $password1) || !preg_match('/ /', $password1) || !preg_match('/-/', $password1) || !preg_match('/_/', $password1) || !preg_match('/\d/', $password1)) {
            $errors[] = "Пароль не удовлетворяет требованиям безопасности";
        }

        if (count($errors) === 0) {
            UserTable::create($email, $full_name, $birth_date, $gender, $interests, $blood_type, $factor, $vk, $password1);
            $_SESSION['USER_ID'] = Database::lastInsertId();
        }

        return $errors;
    }

    public static function signIn(string $email, string $password): string
    {
        if (static::isAuthorized()) {
            return "Вы уже авторизованы";
        }

        if (UserTable::is_blocked($email)) {
            return "Превышено количество попыток входа, вы временно заблокированы";
        }

        $user = UserTable::get_by_email($email);
        if (null === $user) {
            return "Пользователь с таким email не найден";
        }
        
        if (!password_verify($password . $user['sault'], $user['password'])) {
            UserTable::addAttemp($email);
            return 'Неверно указан пароль';
        }

        $_SESSION['USER_ID'] = $user['id'];

        return '';
    }

    public static function signOut()
    {
        unset($_SESSION['USER_ID']);
    }

    public static function isAuthorized(): bool
    {
        return isset($_SESSION['USER_ID']);
    }

    public static function current(): array
    {
        if (!static::isAuthorized()) {
            return null;
        }

        return UserTable::get_by_id($_SESSION['USER_ID']);
    }
}
