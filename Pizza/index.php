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
    <script src="js/account.js"></script>
    <script src="js/check-login.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-logo"></a>
    <button onclick="showDropdown('navbarSupportedContent')" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
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
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="carousel-img d-block img-fluid" src="img/main-slidebar/slide01.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block shadow-text">
                <h3>Акции</h3>
                <p>Узнавайте первыми о наших акциях и выгодных предложениях</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-img d-block img-fluid" src="img/main-slidebar/slide02.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block shadow-text">
                <h3>Каталог</h3>
                <p>Самые разные пиццы, а также горячие блюда, пироги и напитки</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-img d-block img-fluid" src="img/main-slidebar/slide03.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block shadow-text">
                <h3>Десерты</h3>
                <p>Порадуте любимую - закажите десерт</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-img d-block img-fluid" src="img/main-slidebar/slide04.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block shadow-text">
                <h3>Наша кухня</h3>
                <p>Мы готовим только из свежих продуктов - это один из секретов вкуса нашей пиццы</p>
            </div>
        </div>
    </div>
    <a onclick="changeElemInCarousel()" class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a onclick="changeElemInCarouselAbove()" class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="h-title">Новинки</h1>
            <p>Мы обновили репцепт нашей фирменной пиццы. Попробуте одними из первых!</p>
            <img class="img-fluid rounded" src="img/news/pizza.jpg">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="h-title">Комплексные предложения</h1>
            <h3 class="mr-2">Пицца + Крылья + Сок = Всего 1050!</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(26)"><img class="card-img-top" src="img/hotDishes/hot3.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title">Крылья «Барбекю», 10 шт</h5>
                                <p class="card-text">Куринные крылья, специи, соус "Барбекю"</p>
                                <p class="card-text">  </p>
                            </div>
                            <!--<div class="card-footer">
                                <h3 class="card-text price">350 ₽</h3><button class="btn float-right" onclick="savePosition(26,'Горячие блюда',350, 'Крылья «Барбекю», 10 шт')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(14)"><img class="card-img-top" src="img/pizza/img14.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title">Цыпленок барбекю</h5>
                                <p class="card-text">Томатный соус, цыпленок, лук красный, моцарелла, соус барбекю и бекон</p>
                                <p class="card-text">  </p>
                            </div><!--
                            <div class="card-footer">
                                <h3 class="card-text price">575 ₽</h3><button class="btn float-right" onclick="savePosition(14,'Пицца',575, 'Цыпленок барбекю')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-lg-4 card-cell">
                        <div class="card">
                            <button class="btn" onclick="showInfoInDialog(33)"><img class="card-img-top" src="img/drink/drink6.jpg"></button>
                            <div class="card-body">
                                <h5 class="card-title">Сок Rich Яблочный, 1л</h5>
                                <p class="card-text">Сок яблочный осветленный 100%</p>
                                <p class="card-text">  </p>
                            </div>
                            <!--<div class="card-footer">
                                <h3 class="card-text price">125 ₽</h3><button class="btn float-right" onclick="savePosition(33,'Напитки',125, 'Сок Rich Яблочный, 1л')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                            </div>-->
                        </div>
                    </div>
                    <button  class="btn btn-success btn-block"  onclick="saveCombo(26,'Горячие блюда',350, 'Крылья «Барбекю», 10 шт', false); saveCombo(14,'Пицца',575, 'Цыпленок барбекю', false); saveCombo(33,'Напитки',125, 'Сок Rich Яблочный, 1л', true);">
                        Добавить набор в корзину
                    </button>
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