<?php
/**
 * Created by PhpStorm.
 * User: oksan
 * Date: 19.04.2018
 * Time: 13:46
 */

$accounts_file = "accounts.xml";

if(isset($_POST['name']) || isset($_POST['surname']) || isset($_POST['mname']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['address']) || isset($_POST['password'])){

//Проверка существования файла
    if(file_exists($accounts_file)){
//    $usersXML = simplexml_load_file($accounts_file);
//    $user = $usersXML->addChild('user');
//    $user->addChild('id', $usersXML -> count()+1);
//    $user->addChild('name',  $_POST['name']);
//    $user->addChild('surname', $usersXML -> $_POST['surname']);
//    $user->addChild('mname', $usersXML -> $_POST['mname']);
//    $user->addChild('email', $usersXML -> $_POST['email']);
//    $user->addChild('phone', $usersXML -> $_POST['phone']);
//    $user->addChild('address', $usersXML -> $_POST['address']);
//    $user->addChild('password', $usersXML -> $_POST['password']);
//   $usersXML->asXML($accounts_file); // сохранение файла
        $dom = new DOMDocument();
        $dom->formatOutput = true;
        $dom -> preserveWhiteSpace = false;
        $dom -> load($accounts_file);
        $users  = $dom -> getElementsByTagName('users');
        //добавление элемента <user> в <users>
        $user = $users[0]->appendChild($dom->createElement('user'));

        // добавление элементов к <user>
        $id = $user->appendChild($dom->createElement('id'));

        $simpleXML = simplexml_load_file($accounts_file);
        $count = $simpleXML -> count();
        $count++;
        $id->appendChild(
            $dom->createTextNode($count));

        $name = $user->appendChild($dom->createElement('name'));
        $name->appendChild(
            $dom->createTextNode($_POST['name']));

        $surname = $user->appendChild($dom->createElement('surname'));
        $surname->appendChild(
            $dom->createTextNode($_POST['surname']));

        $mname = $user->appendChild($dom->createElement('mname'));
        $mname->appendChild(
            $dom->createTextNode($_POST['mname']));

        $email = $user->appendChild($dom->createElement('email'));
        $email->appendChild(
            $dom->createTextNode($_POST['email']));

        $phone = $user->appendChild($dom->createElement('phone'));
        $phone ->appendChild(
            $dom->createTextNode($_POST['phone']));

        $address = $user->appendChild($dom->createElement('address'));
        $address ->appendChild(
            $dom->createTextNode($_POST['address']));

        $password = $user->appendChild($dom->createElement('password'));
        $password ->appendChild(
            $dom->createTextNode($_POST['password']));

        $dom -> save($accounts_file);
    } else {
        //Создает XML-строку и XML-документ при помощи DOM
        $dom = new DomDocument('1.0','UTF-8');

        //добавление корня - <users>
        $users = $dom->appendChild($dom->createElement('users'));

        //добавление элемента <user> в <users>
        $user = $users->appendChild($dom->createElement('user'));

        // добавление элементов к <user>
        $id = $user->appendChild($dom->createElement('id'));
        $id->appendChild(
            $dom->createTextNode(1));

        $name = $user->appendChild($dom->createElement('name'));
        $name->appendChild(
            $dom->createTextNode($_POST['name']));

        $surname = $user->appendChild($dom->createElement('surname'));
        $surname->appendChild(
            $dom->createTextNode($_POST['surname']));

        $mname = $user->appendChild($dom->createElement('mname'));
        $mname->appendChild(
            $dom->createTextNode($_POST['mname']));

        $email = $user->appendChild($dom->createElement('email'));
        $email->appendChild(
            $dom->createTextNode($_POST['email']));

        $phone = $user->appendChild($dom->createElement('phone'));
        $phone ->appendChild(
            $dom->createTextNode($_POST['phone']));

        $address = $user->appendChild($dom->createElement('address'));
        $address ->appendChild(
            $dom->createTextNode($_POST['address']));

        $password = $user->appendChild($dom->createElement('password'));
        $password ->appendChild(
            $dom->createTextNode($_POST['password']));

        //Генерация xml
        $dom->formatOutput = true; // установка атрибута formatOutput
        // domDocument в значение true
        // save XML as string or file
        //$users = $dom->saveXML(); // передача строки в test1
        $dom->save($accounts_file); // сохранение файла
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/shop.js"></script>
    <script src="js/dropdowns.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/global-order.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/formValidation.js"></script>
    <script src="js/check-login.js"></script>
    <script src="js/account.js"></script>
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
                    <a class="dropdown-item log-true" href="profile.php">Перейти в профиль</a>
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

<div class="container empty-container">
    <div class="row">
        <div class="col-12">
      <h1 class="text-center">Вы успешно зарегистрировались!</h1>
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

