<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/LR3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/LR3/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    <title>Document</title>
</head>
<header>
        <div class="top-navbar">
            <div class="container d-flex justify-content-between align-items-center p-1">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Для бизнеса</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Карьера в Авито</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Помощь</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Каталоги
                        </a>
                        <ul class="dropdown-menu top-navbar-imposed">
                            <li><a class="dropdown-item" href="#">Каталог автомобилей</a></li>
                            <!--<li><a class="dropdown-item" href="#">Каталог новостроек</a></li>-->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Каталог новостроек</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Польза</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center"><a><i class="fas fa-heart fa-2x me-3 custom-icon"></i></a><i class="fas fa-shopping-cart fa-2x me-3 custom-icon"></i>
                    <!--<a class="nav-link me-3" href="#">Вход и регистрация</a>-->
                    <?php include("home-block.php") ?>
                    <button type="button" class="btn btn-primary">Разместить объявление</button>
                </div>
            </div>
        </div>
        <div class="search-navbar p-2">
            <div class="container">
                <ul class="nav justify-content-between">
                    <li class="nav-item">
                        <img src="/LR3/inc/images/logo.png.PNG" alt="logo">
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary">Все категории</button>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline d-flex">
                            <input class="form-control mr-3" type="search" placeholder="Search"
                            aria-label="Поиск по объявлениям">
                            <button class="btn btn-outline-success my-2 my-sm-0">Найти</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Волгоград, район
                            <p>радиус</p>
                        </a>
                    </li>
                </ul>
            </div>
    </header>