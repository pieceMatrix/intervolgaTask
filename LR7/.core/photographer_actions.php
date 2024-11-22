<?php
class PhotographerActions
{
    public static function add($img_path)
    {
        $errors = [];
        $patronymic = null;
        if ('POST' !== $_SERVER['REQUEST_METHOD']) {
            return [];
        }
        if (!file_exists($_FILES['profile']['tmp_name'])) {
            $img_path = '';
        }
        return PhotographerLogic::add($img_path, $_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['biography'], $_POST['birth_year'], $_POST['id_photo_type']);
    }
    public static function update($id, $img_path)
    {
        if ('POST' !== $_SERVER['REQUEST_METHOD']) {
            return [];
        }
        if (!file_exists($_FILES['profile']['tmp_name'])) {
            $img_path = '';
        }
        return PhotographerLogic::update($id, $img_path, $_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['biography'], $_POST['birth_year'], $_POST['id_photo_type']);
    }
    public static function delete_by_id($id)
    {
        PhotographerTable::delete_by_id($id);
    }
    public static function get_by_id($id)
    {
        return PhotographerLogic::get_by_id($id);
    }
}
