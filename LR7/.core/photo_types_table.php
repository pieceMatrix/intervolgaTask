<?php
class PhotoTypesTable
{
    public static function get_all() {
        $query = Database::query("SELECT * FROM photo_types");
        $query->execute();
        return $query->fetchAll();
    }

    public static function get_by_id(int $id) {
        $query = Database::prepare("SELECT * FROM `photo_types` WHERE `id` = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $users = $query->fetchAll();

        if (!count($users)) {
            return null;
        }

        return $users[0];
    }    

}
