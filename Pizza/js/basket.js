//Функция, выполняющаяся при загрузке страницы "Корзина"
document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("basket-div").innerHTML = '';
    //Проверяем колисетво товаров
    if (setCountOfElements() == 0) {
        document.getElementById("basket-div").innerHTML += '<h3 class="text-center">Корзина пуста</h3>';
    } else {
        //Считываем товары из cookie
        var json_str = getCookie(COOKIE_NAME);
        var order;
        try {
            order = JSON.parse(json_str);
        } catch (err) {
            order = [];
        }

        //Отображение шаблона таблицы
        document.getElementById("basket-div").innerHTML += '<div class="table-responsive">\n' +
            '                    <table class="table">\n' +
            '                        <thead>\n' +
            '                        <tr>\n' +
            '                            <th scope="col">#</th>\n' +
            '                            <th scope="col">Наименование</th>\n' +
            '                            <th scope="col">Цена</th>\n' +
            '                            <th scope="col">Количество</th>\n' +
            '                            <th scope="col">Итоговая цена по позиции</th>\n' +
            '                            <th></th>\n' +
            '                        </tr>\n' +
            '                        </thead>\n' +
            '                        <tbody id="tbody-basket">\n' +
            '                        </tbody>\n' +
            '                    </table>\n' +
            '                </div>';

        var price = 0;

        //Отображение каждого товара и подсчет общей цены
        order.forEach(function (val, j) {
            document.getElementById("tbody-basket").innerHTML += '<tr> ' +
                '<td>' + (j+1) + '</td>' +
                '                            <td>' + val.item.name + '</td>\n' +
                '                            <td>' + val.item.price + ' ₽</td>\n' +
                '                            <td><div class="plus-minus-div"><button onclick="decCountOfItem(' + val.item.id + ')" class="btn"><img class="plus-minus-img" src="img/icons8-минус-48.png"></button>' + val.count + '<button onclick="incCountOfItem(' + val.item.id + ')" class="btn"><img class="plus-minus-img" src="img/icons8-плюс-48.png"></button></div></td>\n' +
                '                            <td>' + (val.item.price * val.count) + ' ₽</td>\n' +
                '                            <td><button onclick="deleteItem(' + val.item.id + ')" class="btn"><img class="plus-minus-img" src="img/icons8-отмена-48.png"></button></td>\n' +
                '                        </tr>\n';
            price+=val.item.price * val.count;
        });

        //Отображение итоговой суммы
        document.getElementById("tbody-basket").innerHTML +=
            '                        <tr>\n' +
            '                            <th class="text-align-right" colspan="4" scope="col">Итого</th>\n' +
            '                            <th scope="col">'+price+' ₽</th>\n' +
            '                        </tr>\n';
        //Добавление кнопок на страницу
        document.getElementById("basket-div").innerHTML += '<hr><button onclick="clearOrder()" class="btn btn-cancel btn-block">Очистить корзину</button>';
        document.getElementById("basket-div").innerHTML += '<button onclick="confirmOrder()" class="btn btn-success btn-block">Оформить заказ</button>';
    }
});

//Функция увеличения количества товаров по id
function incCountOfItem(id) {
    var json_str = getCookie(COOKIE_NAME);
    var order;
    try {
        order = JSON.parse(json_str);
    } catch (err) {
        order = [];
    }
    for (var i = 0; i < order.length; i++) {
        if (order[i].item.id == id) {
            order[i].count++;
        }
    }

    setCookie(COOKIE_NAME, JSON.stringify(order));
    location.reload();
}

//Функция уменьшения количества товаров по id
function decCountOfItem(id) {
    var json_str = getCookie(COOKIE_NAME);
    var order;
    try {
        order = JSON.parse(json_str);
    } catch (err) {
        order = [];
    }
    for (var i = 0; i < order.length; i++) {
        if (order[i].item.id == id) {
            order[i].count--;
            if (order[i].count <= 0) {
                deleteItem(id);
                return;
            }
        }
    }
    setCookie(COOKIE_NAME, JSON.stringify(order));
    location.reload();
}

//Функция удаления товара по id
function deleteItem(id) {
    var json_str = getCookie(COOKIE_NAME);
    var order;
    try {
        order = JSON.parse(json_str);
    } catch (err) {
        order = [];
    }
    for (var i = 0; i < order.length; i++) {
        if (order[i].item.id == id) {
            order.splice(i, 1);
        }
    }
    setCookie(COOKIE_NAME, JSON.stringify(order));
    location.reload();
}

//Функция установки куки для отчистки корзины
function clearOrder() {
    setCookie(COOKIE_NAME,'');
    location.reload();
}

//Функция подтверждения заказа
function confirmOrder() {
    alert('Заказ оформлен! Ожидайте звонок оператора.');
    setCookie(COOKIE_NAME,'');
    location.reload();
}