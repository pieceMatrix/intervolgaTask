<?php
class PhotographerLogic
{
    public static function add(
        $img_path,
        $surname,
        $name,
        $patronymic,
        $biography,
        $birth_year,
        $id_photo_type,
    ): array {

        $errors = [];
        if ($img_path === '') {
            $errors[] = 'Добавьте изображение';
        }
        $parts = explode('.', $img_path);
        if (!in_array(end($parts), ['png', 'jpg', 'jpeg'])) {
            $errors[] = 'Приложенный файл должен быть изображением';
        }
        if (!isset($_POST['surname']) || $_POST['surname'] === '') {
            $errors[] = 'Добавьте фамилию';
        }
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $errors[] = 'Добавьте имя';
        }
        if (!isset($_POST['birth_year']) || $_POST['birth_year'] === '') {
            $errors[] = 'Добавьте год рождения';
        }
        if (!isset($_POST['biography']) || $_POST['biography'] === '') {
            $errors[] = 'Добавьте биографию';
        }
        if (!isset($_POST['id_photo_type']) || $_POST['id_photo_type'] === '') {
            $errors[] = 'Добавьте тип съемки';
        }

        if (count($errors) === 0) {
            PhotographerTable::create($img_path, $surname, $name, $patronymic, $biography, $birth_year, $id_photo_type);
        }

        return $errors;
    }

    public static function update(
        $id,
        $img_path,
        $surname,
        $name,
        $patronymic,
        $biography,
        $birth_year,
        $id_photo_type,
    ) {
        $errors = [];
        if ($img_path === '') {
            $errors[] = 'Добавьте изображение';
        }
        $parts = explode('.', $img_path);
        if (!in_array(end($parts), ['png', 'jpg', 'jpeg'])) {
            $errors[] = 'Приложенный файл должен быть изображением';
        }
        if (!isset($_POST['surname']) || $_POST['surname'] === '') {
            $errors[] = 'Добавьте фамилию';
        }
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $errors[] = 'Добавьте имя';
        }
        if (!isset($_POST['birth_year']) || $_POST['birth_year'] === '') {
            $errors[] = 'Добавьте год рождения';
        }
        if (!isset($_POST['biography']) || $_POST['biography'] === '') {
            $errors[] = 'Добавьте биографию';
        }
        if (!isset($_POST['id_photo_type']) || $_POST['id_photo_type'] === '') {
            $errors[] = 'Добавьте тип съемки';
        }

        if (count($errors) === 0) {
            PhotographerTable::update($id, $img_path, $surname, $name, $patronymic, $biography, $birth_year, $id_photo_type);
        }

        return $errors;
    }

    public static function get_all()
    {
        return PhotographerTable::get_all();
    }

    public static function get_by_id($id)
    {
        return PhotographerTable::get_by_id($id);
    }

    public static function delete_by_id($id)
    {
        return PhotographerTable::delete_by_id($id);
    }

}
