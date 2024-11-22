<?php

$errors = [];

function unset_extra($obj): array {
    unset($obj['id']);
    unset($obj['is_deprecated']);
    return $obj;
}

if (isset($_POST['import']) && $_POST['import'] !== '') {
    $importUrl = urldecode($_POST['import']);
    if (!str_starts_with($importUrl, 'http://') && !str_starts_with($importUrl, 'https://')) {
        $errors[] = "Необходимо ввести http адрес";
    }
    $request = curl_init($importUrl);
    curl_setopt($request, CURLOPT_TIMEOUT, 50);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    $type = curl_getinfo($request, CURLINFO_CONTENT_TYPE);
    if (empty($errors)) {
        if (!$result = json_decode(curl_exec($request), true)) {
            $errors[] = "Неверная структура файла";
        } else {
            Database::query("UPDATE photographers SET is_deprecated = TRUE")->execute();
            foreach ($result as $photographer) {
                if (!isset($photographer['surname']) || !isset($photographer['name']) ||
                    !isset($photographer['guid']) || !isset($photographer['img_path']) ||
                    !isset($photographer['biography']) || !isset($photographer['birth_year']) ||
                    !isset($photographer['id_photo_type'])) {

                    $errors[] = "Неверная структура файла";
                    continue;

                }

                $query = Database::prepare("SELECT * FROM photographers WHERE guid = :guid");
                $query->execute([":guid" => $photographer['guid']]);

                $prev_photographer = $query->fetch(PDO::FETCH_ASSOC);
                if ($prev_photographer !== NULL && $prev_photographer !== false) {
                    
                    $prev_photographer = unset_extra($prev_photographer);
                    if (crc32(implode($photographer)) === crc32(implode($prev_photographer))) {
                        Database::prepare("UPDATE photographers SET is_deprecated = FALSE WHERE guid = :guid")->execute([":guid" => $prev_photographer['guid']]);
                    } else {
                        $query = Database::prepare("UPDATE photographers SET
                        name = :name, surname = :surname, patronymic = :patronymic img_path = :img_path, biography = :biography, birth_year = :birth_year, id_photo_type = :id_photo_type, is_deprecated = FALSE WHERE guid = :guid");
                        $query->bindParam(":guid", $photographer['guid']);
                        $query->bindParam(":name", $photographer['name']);
                        $query->bindParam(":surname", $photographer['surname']);
                        $query->bindParam(":img_path", $photographer['img_path']);
                        $query->bindParam(":biography", $photographer['biography']);
                        $query->bindParam(":birth_year", $photographer['birth_year']);
                        $query->bindParam(":patronymic", $photographer['patronymic']);
                        $query->bindParam(":id_photo_type", $photographer['id_photo_type']);
                        $query->execute();
                    }
                }
                else {
                    $query = Database::prepare("INSERT INTO `photographers`(`guid`, `img_path`, `surname`, `name`, `patronymic`, `biography`, `birth_year`, `id_photo_type`) VALUES
                    (:guid, :img_path, :surname, :name, :patronymic, :biography, :birth_year, :id_photo_type)");
                    $query->bindParam(":guid", $photographer['guid']);
                    $query->bindParam(":name", $photographer['name']);
                    $query->bindParam(":surname", $photographer['surname']);
                    $query->bindParam(":img_path", $photographer['img_path']);
                    $query->bindParam(":biography", $photographer['biography']);
                    $query->bindParam(":birth_year", $photographer['birth_year']);
                    $query->bindParam(":patronymic", $photographer['patronymic']);
                    $query->bindParam(":id_photo_type", $photographer['id_photo_type']);
                    $query->execute();
                }
            }
            Database::query("DELETE FROM `photographers` WHERE is_deprecated = 1")->execute();
        }
    }
}
