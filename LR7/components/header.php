<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="/LR7/inc/css/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/LR7/inc/css/index.css">
</head>

<body>

    <header class="w-100 fixed-top bg-light bg-opacity-50">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="col-sm-4 navbar-brand"><a href="/LR7/pages/index.php"><img class="logo" src="/LR7/inc/images/on_page_fig/logo.png"></a></div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link fw-bold link-offset-2 hover-underline" href="#">Портфолио</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link-offset-2 hover-underline" href="#">Достижения</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link-offset-2 hover-underline" href="#">Наши студии</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link-offset-2 hover-underline" href="#">Филиалы</a>
                        </li>
                    </ul>
                </div>
                <?php include("auth-block.php") ?>
            </nav>
        </div>
    </header>
    <div class="bg-main top-padding">
        <div class="m-auto container row">
            <div class="col align-self-center">
                <h1 class="mb-4 fw-bold">Красивое фото на паспорт и документы в России</h1>
                <p>Профессиональные фотографы и мягкий свет. Делаем ретушь журнального уровня по вашим пожеланиям.
                    Уютные фотостудии в 15 городах России.</p>
                <p>Работаем по предварительной записи или в порядке живой очереди. Без выходных.</p>
                <a href="#" class="btn btn-dark custom-btn my-5 fw-bold">Выбрать город</a>
            </div>
            <div class="col">
                <img class="w-100" src="/LR7/inc/images/on_page_fig/3x4photo.jpg">
            </div>
        </div>
    </div>