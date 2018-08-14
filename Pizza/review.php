<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Отзывы</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/shop.js"></script>
    <script src="js/dropdowns.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/global-order.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/check-login.js"></script>
    <script src="js/account.js"></script>
    <script src="js/review.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-logo"></a>
    <button onclick="showDropdown('navbarSupportedContent')" class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Главная</a>
            </li>
            <li class="nav-item dropdown">
                <a onclick="showDropdown('div-categories')" class="nav-link dropdown-toggle" id="navbarDropdown"
                   href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Меню
                </a>
                <div id="div-categories" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="shop.php?a=0">Пицца</a>
                    <a class="dropdown-item" href="shop.php?a=1">Пироги</a>
                    <a class="dropdown-item" href="shop.php?a=2">Горячие блюда</a>
                    <a class="dropdown-item" href="shop.php?a=3">Напитки</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="shares.php">Акции</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="news.php">Новости</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="review.php">Отзывы</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.php">Контакты</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a onclick="showDropdown('drop1')" class="nav-link dropdown-toggle" href="#" id="navbarDropdown1"
                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn my-2 my-sm-0"><img src="img/icons8-пользователь-без-половых-признаков-48.png">
                    </button>
                </a>
                <div id="drop1" class="dropdown-menu-right dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item log-false" href="signin.php">Вход</a>
                    <a class="dropdown-item log-false" href="signup.php">Регистрация</a>
                    <a class="dropdown-item log-true" href="#">Перейти в профиль</a>
                    <a class="dropdown-item log-true" onclick="exitFromAccount()" href="#">Выход</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="basket.php">
                    <button class="btn my-2 my-sm-0"><img src="img/icons8-корзина-48.png">
                        <div id="items-count">0</div>
                    </button>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="h-title">Отзывы</h1>
            <p>
                "Заказывали 60 пицц для мероприятия. Звонили вечером - в 11 часов утра весь заказ уже выл у нас. В подарок получили фирменную пиццу в 55 см. "
            </p>
            <h4>ООО "Адмирал", м. Сенная - 26.01.2017 18:40 <br></h4>
            <br>
            <p>
                "Удобно, что есть безналичная оплата"
            </p>
            <h4>Никита, Сестрорецк - 07.03.2018 10:53<br></h4>
            <br>
            <p>
                "Заказывали три пиццы и напитки. Доставили быстро! В комплекте с доставкой была одноразовая посуда и салфектки"
            </p>
            <h4> Оля, Стельна - 09.05.2018 16:04<br></h4>

            <?php
            $review_file = "php/review.xml";
            if (file_exists($review_file)) {
                $reviewsXML = simplexml_load_file($review_file);
                foreach ($reviewsXML->review as $review) {
                   echo '<br>
                    <p>',$review->text,'</p><h4>',$review->name,' - ',$review->date,'<br></h4>';
                }
            }
            ?>
            <div id="main-form">

            </div>
    </div>
</div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="mr-5"><p>@Oksana Lysenko Studio</p></div>
            </div>
            <div class="col-6 text-align-right">
                <div class="mr-5"></div>
                <p>Количество посещений сайта: <?php include('php/counter.php'); ?></p></div>
        </div>
    </div>
</footer>
</body>
</html>
