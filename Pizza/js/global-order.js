var COOKIE_NAME = "Items";

//Подсчет товаров в корзине
function setCountOfElements() {
    var count = 0;

    var JSON_STR = getCookie(COOKIE_NAME);

    if(JSON_STR!=undefined){
        var order;
        try {
            order = JSON.parse(JSON_STR);
        } catch (err) {
            order=[];
        }

        for (var i = 0; i < order.length; i++) {
            count +=order[i].count;
        }
    }

    document.getElementById("items-count").innerHTML = count;
    return count;
}

//Функция запуска подсчета количества товаров при загрузке страницы
document.addEventListener("DOMContentLoaded", function (event) {
    setCountOfElements();});
