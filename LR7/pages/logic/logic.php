<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR7/.core/index.php");

$sql = "SELECT p.id, p.img_path, p.surname, p.name, p.patronymic, p.biography, p.birth_year, pt.type as 'photo_type'
        FROM `photographers` p
        JOIN `photo_types` pt ON p.id_photo_type = pt.id";

function add_condition($sql, $condition) {
    if (!str_contains($sql, "WHERE")) {
        $sql .= " WHERE";
    } else {
        $sql .= " AND";
    }
    return $sql . " $condition";
}

$conditions = [
    'birth-year-from' => 'p.birth_year > :birthyearfrom',
    'birth-year-to' => 'p.birth_year < :birthyearto',
    'photo-type' => 'pt.id = :phototype',
    'biography' => 'p.biography LIKE CONCAT(\'%\', :biography, \'%\')',
    'surname' => 'p.surname = :surname',
];

foreach($conditions as $query => $condition) {
    if (isset($_GET[$query]) && $_GET[$query] !== '') {
        $sql = add_condition($sql, $condition);
    } else {
        unset($conditions[$query]);
    }
}


$statement = Database::prepare($sql);


foreach(array_keys($conditions) as $query) {
    $statement->bindValue(":".str_replace('-', '', $query), $_GET[$query]);
}

try {
    $statement->execute();
} catch (PDOException $exception) {
    echo $exception->getMessage();
    die;
}

function get_options($selected) {
    $query = Database::query('SELECT * FROM photo_types');
    $res = '';
    while ($row = $query->fetch()) {
        $option_state = (($selected === "{$row['id']}") ? 'selected' : '');
        $res .= "<option value=\"{$row['id']}\" $option_state>" . htmlspecialchars($row['type']) . '</option>';
    }
    return $res;
}

function set_query_values($name) {
    if (isset($_GET[$name]) && $_GET[$name] !== '') {
        return 'value="'.$_GET[$name].'"';
    } else {
        return '';
    }
}