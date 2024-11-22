<?php
class PhotoTypesActions {
    public static function get_options(int $selected) {
        $res = '';
        foreach (PhotoTypesLogic::get_all() as $type) {
            $option_state = (($selected === $type['id']) ? 'selected' : '');
            $res .= "<option value=\"{$type['id']}\" $option_state>" . htmlspecialchars($type['type']) . '</option>';
        }
        return $res;
    }
}