/* Функция выхода из аккаунта*/
function exitFromAccount() {
    var name = 'email';
    var cookieDate = new Date();
    cookieDate.setTime(cookieDate.getTime() -1);
    //Удаление куки посредством установки прошедшей даты действия
    var cookie = name +="=; expires=" + cookieDate.toUTCString();
    document.cookie = cookie;
    //Обновление страницы
    location.reload();
}