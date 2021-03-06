<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Акции</title>

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
                <a class="nav-link active" href="shares.php">Акции</a>
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
            <p><i>май - июнь 2018</i></p>
            <h3 class="mr-2">Пицца + Крылья + Сок = Всего 1050!</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(26)"><img class="card-img-top" src="img/hotDishes/hot3.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title text-center">Крылья «Барбекю», 10 шт</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(14)"><img class="card-img-top" src="img/pizza/img14.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title text-center">Цыпленок барбекю</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(33)"><img class="card-img-top" src="img/drink/drink6.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title text-center">Сок Rich Яблочный, 1л</h5>
                            </div>
                        </div>
                    </div>
                    <button  class="btn btn-success btn-block"  onclick="saveCombo(26,'Горячие блюда',350, 'Крылья «Барбекю», 10 шт', false); saveCombo(14,'Пицца',575, 'Цыпленок барбекю', false); saveCombo(33,'Напитки',125, 'Сок Rich Яблочный, 1л', true);">
                        Добавить набор в корзину
                    </button>
                </div>
            </div>
            <hr>
            <p><i>май - август 2018</i></p>
            <h3 class="mr-2">Ваши любимые пиццы по специальной цене - 475!</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(7)"><img class="card-img-top" src="img/pizza/img7.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title text-center">Маргарита</h5>
                            </div>
                            <div class="card-footer">
                                <h3 class="card-text price">475 ₽</h3><button class="btn float-right" onclick="savePosition(7,'Пицца',475, 'Маргарита')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(8)"><img class="card-img-top" src="img/pizza/img8.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title text-center">Сырная</h5>
                            </div>
                            <div class="card-footer">
                                <h3 class="card-text price">475 ₽</h3><button class="btn float-right" onclick="savePosition(8,'Пицца',475, 'Сырная')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(6)"><img class="card-img-top" src="img/pizza/img6.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title text-center">Грибы и ветчина</h5>
                            </div>
                            <div class="card-footer">
                                <h3 class="card-text price">475 ₽</h3><button class="btn float-right" onclick="savePosition(6,'Пицца',475, 'Грибы и ветчина')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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