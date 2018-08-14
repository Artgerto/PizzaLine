<?php

$review_file = "review.xml";

//Проверяем, указаны ли необходимые входные данные
if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['text'])){

//Проверка существования файла
    if(file_exists($review_file)){
        $dom = new DOMDocument();
        $dom->formatOutput = true;
        $dom -> preserveWhiteSpace = false;
        //Подгружаем файл
        $dom -> load($review_file);
        //Добавляем новый элемент с данными в иерархию
        $reviews  = $dom -> getElementsByTagName('reviews');
        $review = $reviews[0]->appendChild($dom->createElement('review'));

        $name = $review->appendChild($dom->createElement('name'));
        $name->appendChild(
            $dom->createTextNode($_POST['name']));

        $email = $review->appendChild($dom->createElement('email'));
        $email->appendChild(
            $dom->createTextNode($_POST['email']));

        $date = $review->appendChild($dom->createElement('date'));
        $date->appendChild(
            $dom->createTextNode(date("d.m.Y H:i")));

        $text = $review->appendChild($dom->createElement('text'));
        $text ->appendChild(
            $dom->createTextNode($_POST['text']));

        $dom -> save($review_file);
    } else {
        //Создает XML-строку и XML-документ при помощи DOM
        $dom = new DomDocument('1.0','UTF-8');
        //Создаем корневой элемент
        $reviews = $dom->appendChild($dom->createElement('reviews'));
        //Добавляем новый элемент с данными в иерархию
        $review = $reviews->appendChild($dom->createElement('review'));

        $name = $review->appendChild($dom->createElement('name'));
        $name->appendChild(
            $dom->createTextNode($_POST['name']));

        $email = $review->appendChild($dom->createElement('email'));
        $email->appendChild(
            $dom->createTextNode($_POST['email']));

        $date = $review->appendChild($dom->createElement('date'));
        $date->appendChild(
            $dom->createTextNode(date("d.m.Y H:i")));

        $text = $review->appendChild($dom->createElement('text'));
        $text ->appendChild(
            $dom->createTextNode($_POST['text']));

        //Генерация xml
        $dom->formatOutput = true; // установка атрибута formatOutput
        $dom->save($review_file); // сохранение файла
    }
}