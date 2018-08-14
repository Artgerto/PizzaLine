document.addEventListener("DOMContentLoaded", function (event) {
    showAccountInfo();});

//Функция получения данных пользователя
function  showAccountInfo() {
    //Считываем email из cookie
    var email = getCookie('email');
    if (email != undefined) {
        //Отправляем POST-запрос на сервер
        var xmlhttp = new XMLHttpRequest(); // Создаём объект XMLHTTP
        xmlhttp.open('POST', './php/getUserInfo.php'); // Открываем aсинхронное соединение
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
        xmlhttp.send("email=" + email); // Отправляем POST-запрос
        xmlhttp.onload = function () { // Ждём ответа от сервера
            if (xmlhttp.readyState === 4) { // Ответ пришёл
                if (xmlhttp.status === 200) { // Сервер вернул код 200 (что хорошо)
                    var json_obj = JSON.parse(xmlhttp.responseText);
                    if (json_obj['e'] == 0) {
                        //Отображаем полученные данные
                        document.getElementById('profile').innerHTML += '<h4 class="h-title text-center">Профиль</h4>' +
                            '<form class="form" action="server_signup.php" method="post" onsubmit="return CheckFormValue()"> ' +
                            '<div class="pre-form"> ' +
                            '<p>Имя</p> ' +
                            '<input disabled type="text" name="name" value="'+ json_obj['name']+'">' +
                        '<p>Фамилия</p> ' +
                        '<input disabled type="text" name="surname" value="'+ json_obj ['surname'] + '"> ' +
                        '<p>Отчество</p> ' +
                        '<input disabled type="text" name="mname" value="'+ json_obj ['mname']+ '"> ' +
                        '<p>Электронная почта</p> ' +
                        '<div id="email-info"></div> ' +
                        '<input disabled type="email" name="email" value="'+ json_obj['email']+ '"> ' +
                        '<p>Телефон для связи</p> ' +
                        '<input disabled type="tel" name="phone" value="'+ json_obj['phone']+ '"> ' +
                        '<p>Адрес доставки</p> ' +
                        '<input disabled type="text" name="address" value="'+json_obj['address']+'"> ' +
                        '</div> ' +
                        '</form>';
                    }
                }
            }
        }
    }else {
        document.getElementById('profile').innerHTML+='<div class="container empty-container"> ' +
                        '<div class="row"> ' +
                        '<div class="col-12"> ' +
                        '<h1 class="text-center">Вы не авторизованы!</h1> ' +
                        '</div> ' +
                        '</div> ' +
                        '</div>';
                }
}