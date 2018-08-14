//Функция проверки полей формы регистрации
function CheckFormValue(){
    var result = true;

    if ((document.getElementsByName("name")[0].value == null) || (document.getElementsByName("name")[0].value.trim() === '')){
        document.getElementsByName("name")[0].classList.add("red-line");
        result = false;
    } else {
        if (document.getElementsByName("name")[0].classList.contains("red-line"))
            document.getElementsByName("name")[0].classList.remove("red-line");
    }

    if ((document.getElementsByName("surname")[0].value == null) || (document.getElementsByName("surname")[0].value.trim() === '')){
        document.getElementsByName("surname")[0].classList.add("red-line");
        result= false;
    } else {
        if (document.getElementsByName("surname")[0].classList.contains("red-line"))
            document.getElementsByName("surname")[0].classList.remove("red-line");
    }

    if ((document.getElementsByName("mname")[0].value == null) || (document.getElementsByName("mname")[0].value.trim() === '')){
        document.getElementsByName("mname")[0].classList.add("red-line");
        result= false;
    } else {
        if (document.getElementsByName("mname")[0].classList.contains("red-line"))
            document.getElementsByName("mname")[0].classList.remove("red-line");
    }

    if ((document.getElementsByName("email")[0].value == null) || (document.getElementsByName("email")[0].value.trim() === '')){
        document.getElementsByName("email")[0].classList.add("red-line");
        result= false;
    } else {
        var r = /^\w+@\w+\.\w{2,4}$/i;
        if (!r.test(document.getElementsByName("email")[0].value)) {
            if (document.getElementsByName("email")[0].classList.contains("red-line"))
                document.getElementsByName("email")[0].classList.remove("red-line");
        } else {
            document.getElementsByName("email")[0].classList.add("red-line");
            result = false;
        }
    }

    if ((document.getElementsByName("phone")[0].value == null) || (document.getElementsByName("phone")[0].value.trim() === '')){
        document.getElementsByName("phone")[0].classList.add("red-line");
        result= false;
    } else {
        var r = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
        if (!r.test(document.getElementsByName("phone")[0].value)) {
            if (document.getElementsByName("phone")[0].classList.contains("red-line"))
                document.getElementsByName("phone")[0].classList.remove("red-line");
        } else {
            document.getElementsByName("phone")[0].classList.add("red-line");
            result = false;
        }
    }

    if ((document.getElementsByName("address")[0].value == null) || (document.getElementsByName("address")[0].value.trim() === '') || (document.getElementsByName("address")[0].value.trim().length <10)){
        document.getElementsByName("address")[0].classList.add("red-line");
        result= false;
    } else {
        if (document.getElementsByName("mname")[0].classList.contains("red-line"))
            document.getElementsByName("mname")[0].classList.remove("red-line");
    }

    if(document.getElementById("pass1").value != document.getElementById("pass2").value){
        document.getElementById('info').innerText='Пароли не совпадают';
        document.getElementById("pass1").classList.add("red-line");
        document.getElementById("pass2").classList.add("red-line");
        result= false;
    } else if (document.getElementById("pass1").value.length<8){
        document.getElementById('info').innerText='Длина пароля должна быть  8';
        document.getElementById("pass1").classList.add("red-line");
        document.getElementById("pass2").classList.add("red-line");
        result= false;
    } else {
        if (document.getElementById("pass1").classList.contains("red-line"))
            document.getElementById("pass1").classList.remove("red-line");
        if (document.getElementById("pass2").classList.contains("red-line"))
            document.getElementById("pass2").classList.remove("red-line");
        document.getElementById('info').innerText='';
    }

    //Отправка POST-запроса на сервер для проверки на существование такого же email в данных пользователей
        var xmlhttp = new XMLHttpRequest(); // Создаём объект XMLHTTP
        xmlhttp.open('POST', './php/checkEmail.php'); // Открываем aсинхронное соединение
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
        xmlhttp.send("email=" + document.getElementsByName("email")[0].value); // Отправляем POST-запрос
        xmlhttp.onload = function() { // Ждём ответа от сервера
            if (xmlhttp.readyState == 4) { // Ответ пришёл
                if(xmlhttp.status == 200) { // Сервер вернул код 200
                    alert(xmlhttp.responseText); // Выводим ответ сервера
                    if (xmlhttp.responseText == '0') {
                        document.getElementById('email-info').innerText='Пользователь с таким email существует';
                        document.getElementById('email-info').classList.add("red-line");
                        result = false;
                    }  else {
                        if (document.getElementById('email-info').classList.contains("red-line"))
                            document.getElementById('email-info').classList.remove("red-line");
                        document.getElementById('email-info').innerText='';
                        //Сохраняем логин пользователя в cookie
                        if(result) {
                            setCookie('email',document.getElementsByName("email")[0].value);
                            document.getElementById("main-form").submit();
                        }
                    };
                }
            }
        }

    return false;
}

//Функция проверки логина и пароля
function CheckLoginAndPassword(){
    //Отправка POST-запроса на сервер
    var xmlhttp = new XMLHttpRequest(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', './php/checkLoginAndPassword.php'); // Открываем aсинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
    xmlhttp.send("email=" + document.getElementsByName("email")[0].value +'&password=' + document.getElementsByName("password")[0].value); // Отправляем POST-запрос
    xmlhttp.onload = function() { // Ждём ответа от сервера
        if (xmlhttp.readyState == 4) { // Ответ пришёл
            if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
                //alert(xmlhttp.responseText); // Выводим ответ сервера
                if (xmlhttp.responseText == '0') {
                    document.getElementById('info').innerText='Неверные данные для входа';
                    document.getElementsByName('password')[0].classList.add("red-line");
                    document.getElementsByName('email')[0].classList.add("red-line");
                }  else {
                    if (document.getElementsByName('email')[0].classList.contains("red-line"))
                        document.getElementsByName('email')[0].classList.remove("red-line");
                    if (document.getElementsByName('password')[0].classList.contains("red-line"))
                        document.getElementsByName('password')[0].classList.remove("red-line");
                    document.getElementById('info').innerText='';
                    setCookie('email', document.getElementsByName('email')[0].value);
                    document.getElementById("main-form").submit();
                };
            }
        }
    }
    return false;
}