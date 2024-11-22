<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR7/.core/index.php');

if (isset($_POST['delete-photographers']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach($_POST['delete-photographers'] as $photographer) {
        PhotographerActions::delete_by_id($photographer);
    }
}

header('Location: /LR7/pages/index.php ');