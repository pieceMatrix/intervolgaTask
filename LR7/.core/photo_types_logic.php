<?php
class PhotoTypesLogic {
    public static function get_all() {
        return PhotoTypesTable::get_all();
    }

    public static function get_by_id(int $id) {
        return PhotoTypesTable::get_by_id($id);
    }
}