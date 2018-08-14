<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пицца - ваш лучший выбор</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/shop.js"></script>
    <script src="js/dropdowns.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/global-order.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/check-login.js"></script>
    <script src="js/account.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-logo"></a>
    <button onclick="showDropdown('navbarSupportedContent')" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Главная</a>
            </li>
            <li class="nav-item dropdown">
                <a onclick="showDropdown('div-categories')" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link active" href="contact.php">Контакты</a>
            </li>

        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a onclick="showDropdown('drop1')" class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn my-2 my-sm-0"><img src="img/icons8-пользователь-без-половых-признаков-48.png"></button>
                </a>
                <div id="drop1" class="dropdown-menu-right dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item log-false" href="signin.php">Вход</a>
                    <a class="dropdown-item log-false" href="signup.php">Регистрация</a>
                    <a class="dropdown-item log-true" href="#">Перейти в профиль</a>
                    <a class="dropdown-item log-true" onclick="exitFromAccount()" href="#">Выход</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="basket.php"><button class="btn my-2 my-sm-0"><img src="img/icons8-корзина-48.png"> <div id="items-count">0 </div> </button></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="h-title">Контакты</h1>
            <h5 class="mr-1">Телефон интернет-магазина: +7 (950)-000-01-78</h5>
            <br>
            <h5 class="mr-1">Адрес нашего ресторана: СПб, м. Парк Победы, Московский парк Победы</h5>
            <h5 class="mr-1">Телефон нашего ресторана: +7 (950)-000-00-78 (бронь мест, заказ мероприятий)</h5>

            <img class="img-fluid rounded" src="img/contact/map.jpg">
            <h5 class="mr-2">Бесплатная доставка по Санкт-Петербургу в пределах КАД</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="h-title">Часто задаваемые вопросы</h1>
            <h3> Как сделать заказ?</h3>
            <h4>1 вариант <br></h4>
            <p>
                1. Выберите товары в каталоге <br>
                2. В корзине просмотрите выбранные товары <br>
                3. ОФормите заказ <br>
                В течение 10 минут с вами свяжется оператор для подтверждения данных <br>

            </p>
            <h4>2 вариант <br></h4>
            <p>
                Свяжитесь с оператором по телефону +7 (950)-000-01-78 и сделайте заказ
            </p>
            <h3> Как быстро доставят заказ?</h3>
            <p>В районе КАД доставка осущесвтляется в течение часа</p>
            <h3> Проводятся ли мероприятия в вашем ресторане?</h3>
            <p>Каждый вечер в пятницу, субботу и воскресень у нас проводятся музыкальные вечера.<br>
                Вы также можете забронировать наше кафе на время своего праздника (свадьба, День Рождения и пр.)
            </p>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="mr-5"><p>@Oksana Lysenko Studio</p> </div>
            </div>
            <div class="col-6 text-align-right">
                <div class="mr-5"></div> <p>Количество посещений сайта: <?php include('php/counter.php'); ?></p> </div>
        </div>
    </div>
    </div>
</footer>
</body>
</html>