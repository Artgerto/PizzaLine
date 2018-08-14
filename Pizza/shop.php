<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Меню</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/shop.js"></script>
    <script src="js/dropdowns.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/global-order.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/check-login.js"></script>
    <script src="js/account.js"></script>

    <?php
    const NUM_OF_PIZZA_CATEGORY = 0;
    const NUM_OF_PIE_CATEGORY = 1;
    const NUM_OF_HOT_CATEGORY = 2;
    const NUM_OF_DRINKS_CATEGORY = 3;
    ?>
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
                <a class="nav-link" href="index.php">Главная </a>
            </li>
            <li class="nav-item dropdown active">
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
        <div class="col-lg-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action <?php if ((($_GET['a']) == NUM_OF_PIZZA_CATEGORY) || empty($_GET['a'])) echo 'active' ?>"
                   id="list-pizza-list" data-toggle="list" href="shop.php?a=0#menu-title" role="tab">Пицца</a>
                <a class="list-group-item list-group-item-action <?php if (($_GET['a']) == NUM_OF_PIE_CATEGORY) echo 'active' ?>"
                   id="list-pie-list" data-toggle="list" href="shop.php?a=1#menu-title" role="tab">Пироги</a>
                <a class="list-group-item list-group-item-action <?php if ($_GET['a'] == NUM_OF_HOT_CATEGORY) echo 'active' ?>"
                   id="list-hot-list" data-toggle="list" href="shop.php?a=2#menu-title" role="tab">Горячие блюда</a>
                <a class="list-group-item list-group-item-action <?php if ($_GET['a'] == NUM_OF_DRINKS_CATEGORY) echo 'active' ?>"
                   id="list-drinks-list" data-toggle="list" href="shop.php?a=3#menu-title" role="tab">Напитки</a>
            </div>
        </div>
        <div class="col-lg-9">
            <div id="menu-container" class="row">
                <?php

                const CATEGORIES_NAME = array("Пицца", "Пироги", "Горячие блюда", "Напитки");

                loadCategory($_GET['a']);

                function loadCategory($num)
                {
                    $itemsXML = simplexml_load_file("xml/Menu.xml");
                    switch ($num) {
                        case NUM_OF_PIE_CATEGORY:
                            foreach ($itemsXML->Item as $item) {
                                if ($item->Category == CATEGORIES_NAME[NUM_OF_PIE_CATEGORY]) {
                                    echo '<div class="col-lg-4 card-cell">
                                                    <div class="card">
                                                        <button class="btn" onclick="showInfoInDialog(', $item->Id, ')"><img class="card-img-top" src="', $item->ImgSrc, '"></button>
                                                        <div class="card-body">
                                                            <h5 class="card-title">', $item->Title, '</h5>
                                                        </div>
                                                        <div class="card-footer">
                                                            <h3 class="card-text price">', $item->Price, ' ₽</h3><button class="btn float-right" onclick="savePosition(', $item->Id, ',\'', $item->Category, '\',', $item->Price, ', \'', $item->Title, '\')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                                                        </div>
                                                   </div>
                                                </div>';
                                }
                            }
                            break;
                        case NUM_OF_HOT_CATEGORY:
                            foreach ($itemsXML->Item as $item) {
                                if ($item->Category == CATEGORIES_NAME[NUM_OF_HOT_CATEGORY]) {
                                    echo '<div class="col-lg-4 card-cell">
                                                    <div class="card">
                                                        <button class="btn" onclick="showInfoInDialog(', $item->Id, ')"><img class="card-img-top" src="', $item->ImgSrc, '"></button>
                                                        <div class="card-body">
                                                            <h5 class="card-title">', $item->Title, '</h5>
                                                        </div>
                                                        <div class="card-footer">
                                                            <h3 class="card-text price">', $item->Price, ' ₽</h3><button class="btn float-right" onclick="savePosition(', $item->Id, ',\'', $item->Category, '\',', $item->Price, ', \'', $item->Title, '\')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                                                        </div>
                                                   </div>
                                                </div>';
                                }
                            }
                            break;
                        case NUM_OF_DRINKS_CATEGORY:
                            foreach ($itemsXML->Item as $item) {
                                if ($item->Category == CATEGORIES_NAME[NUM_OF_DRINKS_CATEGORY]) {
                                    echo '<div class="col-lg-4 card-cell">
                                                    <div class="card">
                                                        <button class="btn" onclick="showInfoInDialog(', $item->Id, ')"><img class="card-img-top" src="', $item->ImgSrc, '"></button>
                                                        <div class="card-body">
                                                            <h5 class="card-title">', $item->Title, '</h5>
                                                        </div>
                                                        <div class="card-footer">
                                                            <h3 class="card-text price">', $item->Price, ' ₽</h3><button class="btn float-right" onclick="savePosition(', $item->Id, ',\'', $item->Category, '\',', $item->Price, ', \'', $item->Title, '\')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                                                        </div>
                                                   </div>
                                                </div>';
                                }
                            }
                            break;
                        default:
                            foreach ($itemsXML->Item as $item) {
                                if ($item->Category == CATEGORIES_NAME[NUM_OF_PIZZA_CATEGORY]) {
                                    echo '<div class="col-lg-4 card-cell">
                                                    <div class="card">
                                                        <button class="btn" onclick="showInfoInDialog(', $item->Id, ')"><img class="card-img-top" src="', $item->ImgSrc, '"></button>
                                                        <div class="card-body">
                                                            <h5 class="card-title">', $item->Title, '</h5>
                                                        </div>
                                                        <div class="card-footer">
                                                            <h3 class="card-text price">', $item->Price, ' ₽</h3><button class="btn float-right" onclick="savePosition(', $item->Id, ',\'', $item->Category, '\',', $item->Price, ', \'', $item->Title, '\')"><img src="img/icons8-добавить-в-корзину-48.png"></button>
                                                        </div>
                                                   </div>
                                                </div>';
                                }
                            }
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <div id="myModal" class=" <?php if (isset($_GET['id'])){
        echo 'show sh-modal';
    } ?> modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div id="mod-cont" class="modal-content">
                <?php
                if (isset($_GET['id'])) {
                    $itemsXML = simplexml_load_file("xml/Menu.xml");
                    foreach ($itemsXML->Item as $item) {
                        if ($item->Id == $_GET['id']){
                            if ($item->Category == CATEGORIES_NAME[NUM_OF_PIZZA_CATEGORY]) {
                                echo '<div id="mod-header" class="modal-header">',$item->Title,
                                '<button onclick="closeModal()" class="close btn" type="button" data-dismiss="modal">×</button></div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row"><div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-6"><img class="img-fluid" src="',$item -> ImgSrc,'"></div>
                              <div class="col-sm-12 col-md-12 col-lg-6" > 
                              <p><i>',$item ->Description,'</i></p>
                              <h5>Состав</h5>
                              <p>',$item -> Composition,'</p><h5>Энергетическая ценность <br> (на 100 г) </h5>
                              <p>',$item -> EnergyValue,'</p>
                              <p>Углеводы: ',$item ->Carbohydrates,'<br> Белки:',$item -> Proteins,'<br> Жиры: ',$item ->Fats,'</p>
                              <h6>Диаметр ',$item->Diametr,'</h6>
                              <h6>Вес ',$item -> Weight,'</h6>
                              <hr><h3>',+$item -> Price,' ₽</h3></div></div></div></div>';
                            } else if(($item->Category == CATEGORIES_NAME[NUM_OF_PIE_CATEGORY]) ||($item->Category == CATEGORIES_NAME[NUM_OF_HOT_CATEGORY])){
                                echo '<div id="mod-header" class="modal-header">',$item->Title,
                                '<button onclick="closeModal()" class="close btn" type="button" data-dismiss="modal">×</button></div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row"><div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-6"><img class="img-fluid" src="',$item -> ImgSrc,'"></div>
                              <div class="col-sm-12 col-md-12 col-lg-6" > 
                              <p><i>',$item ->Description,'</i></p>
                              <h5>Состав</h5>
                              <p>',$item -> Composition,'</p><h5>Энергетическая ценность <br> (на 100 г) </h5>
                              <p>',$item -> EnergyValue,'</p>
                              <p>Углеводы: ',$item ->Carbohydrates,'<br> Белки:',$item -> Proteins,'<br> Жиры: ',$item ->Fats,'</p>
                              <h6>Вес ',$item -> Weight,'</h6>
                              <hr><h3>',+$item -> Price,' ₽</h3></div></div></div></div>';
                            } else if($item->Category == CATEGORIES_NAME[NUM_OF_DRINKS_CATEGORY]){
                                echo '<div id="mod-header" class="modal-header">',$item->Title,
                                '<button onclick="closeModal()" class="close btn" type="button" data-dismiss="modal">×</button></div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row"><div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-6"><img class="img-fluid" src="',$item -> ImgSrc,'"></div>
                              <div class="col-sm-12 col-md-12 col-lg-6" > 
                              <p><i>',$item ->Description,'</i></p>
                              <h5>Состав</h5>
                              <p>',$item -> Composition,'</p><h5>Энергетическая ценность <br> (на 100 г) </h5>
                              <p>',$item -> EnergyValue,'</p>
                              <p>Углеводы: ',$item ->Carbohydrates,'<br> Белки:',$item -> Proteins,'<br> Жиры: ',$item ->Fats,'</p>
                              <h6>Объем ',$item -> Weight,'</h6>
                              <hr><h3>',+$item -> Price,' ₽</h3></div></div></div></div>';
                            }
                        }
                    }
                }
                ?>
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
    </div>
</footer>
</body>
</html>