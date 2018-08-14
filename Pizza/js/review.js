document.addEventListener("DOMContentLoaded", function (event) {
    getReviewInfo();});

//Получение имени для отзыва
function  getReviewInfo() {
    var email = getCookie('email');
    //Проверяем, авторизован ли пользователь
    if (email != undefined) {
        //Отправляем на сервер POST-запрос для получения имени
        var xmlhttp = new XMLHttpRequest(); // Создаём объект XMLHTTP
        xmlhttp.open('POST', './php/getUserInfo.php'); // Открываем aсинхронное соединение
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
        xmlhttp.send("email=" + email); // Отправляем POST-запрос
        xmlhttp.onload = function () { // Ждём ответа от сервера
            if (xmlhttp.readyState === 4) { // Ответ пришёл
                if (xmlhttp.status === 200) { // Сервер вернул код 200 (что хорошо)
                    var json_obj = JSON.parse(xmlhttp.responseText);
                    //Выводим форму для отзыва с именем пользователя
                    if (json_obj['e'] == 0) {
                        document.getElementById('main-form').innerHTML += '<h2 class="h-title">Оставьте ваш отзыв</h2>' +
                            '        <form id="main-form" action="#">' +
                            '<input id="name" value="'+json_obj['name']+'" class="input-name" disabled><br> ' +
                        '<br> ' +
                        '<textarea id="text" class="rev-textarea"> ' +
                        '</textarea> ' +
                            '<p id="info"></p>' +
                        '<button class="btn btn-block btn-success" onclick="sendReview()" type="submit">Отправить</button></form>';
                    }
                }
            }
        }
    }
}

//Функция отправки отзыва
function sendReview() {
    var email = getCookie('email');
    if(!document.getElementById("text").value.trim()<10){
        if (email != undefined) {
            //Отправка отзыва POST-запросом на сервер
            var xmlhttp = new XMLHttpRequest(); // Создаём объект XMLHTTP
            xmlhttp.open('POST', './php/sendReview.php'); // Открываем aсинхронное соединение
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
            xmlhttp.send("email=" + email +"&name="+document.getElementById("name").value+"&text="+document.getElementById("text").value); // Отправляем POST-запрос
            xmlhttp.onload = function () { // Ждём ответа от сервера
                if (xmlhttp.readyState === 4) { // Ответ пришёл
                    if (xmlhttp.status === 200) { // Сервер вернул код 200 (что хорошо)
                        location.reload();
                    }
                }
            }
        }
    } else document.getElementById("info").innerText = 'Поле отыва содержит менее 10 символов';

}