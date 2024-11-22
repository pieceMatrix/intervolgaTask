<?php
class PhotographerTable
{
    public static function create(
        string $img_path,
        string $surname,
        string $name,
        string $patronymic,
        string $biography,
        int $birth_year,
        int $id_photo_type,
    ) {
        $query = Database::prepare(
            "INSERT INTO `photographers` (`guid`, `img_path`, `surname`, `name`, `patronymic`, `biography`, `birth_year`, `id_photo_type`)
                VALUES (UUID(), :img_path, :surname, :name, :patronymic, :biography, :birth_year, :id_photo_type)"
        );

        $query->bindValue(":img_path", $img_path);
        $query->bindValue(":surname", $surname);
        $query->bindValue(":name", $name);
        $query->bindValue(":patronymic", $patronymic);
        $query->bindValue(":biography", $biography);
        $query->bindValue(":birth_year", $birth_year);
        $query->bindValue(":id_photo_type", $id_photo_type);

        if (!$query->execute()) {
            throw new PDOException('При добавлении фотографа произошла ошибка');
        }
    }

    public static function update(
        int $id,
        string $img_path,
        string $surname,
        string $name,
        string $patronymic,
        string $biography,
        int $birth_year,
        int $id_photo_type,
    ) {
        $query = Database::prepare(
            "UPDATE `photographers` SET
            `img_path` = :img_path, `surname` = :surname, `name` = :name, `patronymic` = :patronymic, `biography` = :biography, `birth_year` = :birth_year, `id_photo_type` = :id_photo_type
            WHERE `id` = :id"
        );

        $query->bindValue(":id", $id);
        $query->bindValue(":img_path", $img_path);
        $query->bindValue(":surname", $surname);
        $query->bindValue(":name", $name);
        $query->bindValue(":patronymic", $patronymic);
        $query->bindValue(":biography", $biography);
        $query->bindValue(":birth_year", $birth_year);
        $query->bindValue(":id_photo_type", $id_photo_type);

        $query->execute();
    }

    public static function get_all() {
        $query = Database::query("SELECT * FROM photographers");
        $query->execute();
        return $query->fetchAll();
    }

    public static function get_by_guid(string $guid): array | null
    {
        $query = Database::prepare("SELECT * FROM `user` WHERE `guid` = :guid");
        $query->bindValue(":guid", $guid);
        $query->execute();

        $users = $query->fetchAll();

        if (!count($users)) {
            return null;
        }

        return $users[0];
    }

    public static function get_by_id(int $id) {
        $query = Database::prepare("SELECT * FROM `photographers` WHERE `id` = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $users = $query->fetchAll();

        if (!count($users)) {
            return null;
        }

        return $users[0];
    }

    public static function delete_by_id($id) {
        $query = Database::prepare("DELETE FROM `photographers` WHERE `id` = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    }
}
