//Отображение кнопок "Войти"/"Зарегистрироваться" или "Выйти"/"Перейти в профиль" в зависимости от статуса авторизации пользователя
document.addEventListener("DOMContentLoaded", function (event) {
    if (getCookie('email') == undefined){
        var elem = document.getElementsByClassName('log-true');
        while(elem.length>0){
            elem[0].remove();
            elem = document.getElementsByClassName('log-true');
        }
    } else {
        var elem = document.getElementsByClassName('log-false');
        while(elem.length>0){
            elem[0].remove();
            elem = document.getElementsByClassName('log-false');
        }
    }
});
