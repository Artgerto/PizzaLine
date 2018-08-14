//Обьявление констант

var NUM_OF_PIZZA_CATEGORY = 0;
var NUM_OF_PIE_CATEGORY = 1;
var NUM_OF_HOT_CATEGORY = 2;
var NUM_OF_DRINKS_CATEGORY = 3;

var CATEGORIES_NAME = {};
CATEGORIES_NAME[NUM_OF_PIZZA_CATEGORY] = "Пицца";
CATEGORIES_NAME[NUM_OF_PIE_CATEGORY] = "Пироги";
CATEGORIES_NAME[NUM_OF_HOT_CATEGORY] = "Горячие блюда";
CATEGORIES_NAME[NUM_OF_DRINKS_CATEGORY] = "Напитки";


//Объекты для представления товаров корзины
function Position(item, count, category){
    this.item = item;
    this.count = count;
    this.category = category;
}

function Item(id, name, price){
    this.id = id;
    this.name = name;
    this.price = price;
}

//Сохранение элемента комбо
function saveCombo(id, category, price, title, al) {

    //Если товар является последним добавленным в набор
    if(al) alert('Набор добавлен в корзину');

    //Получаем значение текущих товаров корзины из cookie
    var JSON_STR = getCookie(COOKIE_NAME);
    var order;
    try {
        order = JSON.parse(JSON_STR);
    } catch (err) {
        order=[];
    }

    //Проверяем, есть ли товар с таким id в корзине
    var countIndex = SearchInOrder(id,order);

    //Если нет
    if ((countIndex==-1)){
        //Добавляем новую позицию в список товаров
        var item = new Item(id, title, price);
        var position = new Position(item, 1,  category);
        order.push(position);
        //Сохраняем в cookie
        setCookie(COOKIE_NAME, JSON.stringify(order));
        setCountOfElements();
    } else {
        //Увеличиваем кол-во товаров этой позиции
        order[countIndex].count++;
        //Сохраняем в cookie
        setCookie(COOKIE_NAME, JSON.stringify(order));
        setCountOfElements();
    }
    //Обновляем страницу
    location.reload();
}

//Функция сохранения позиции
function savePosition(id, category, price, title) {

    alert('Товар добавлен в корзину');

    //Получаем значение текущих товаров корзины из cookie
    var JSON_STR = getCookie(COOKIE_NAME);
    var order;
    try {
        order = JSON.parse(JSON_STR);
    } catch (err) {
        order=[];
    }

    //Проверяем, есть ли товар с таким id в корзине
    var countIndex = SearchInOrder(id,order);

    //Если нет
    if ((countIndex==-1)){
        //Добавляем новую позицию в список товаров
        var item = new Item(id, title, price);
        var position = new Position(item, 1,  category);
        order.push(position);
        //Сохраняем в cookie
        setCookie(COOKIE_NAME, JSON.stringify(order));
        setCountOfElements();
    } else {
        //Увеличиваем кол-во товаров этой позиции
        order[countIndex].count++;
        //Сохраняем в cookie
        setCookie(COOKIE_NAME, JSON.stringify(order));
        setCountOfElements();
    }
    //Обновление страницы
    location.reload();
}

//Функция поиска товара с указанным id в списке товаров
function SearchInOrder(index, order) {
    for (var i = 0; i < order.length; i++) {
        if (order[i].item.id == index) {
            return i;
        }
    }
    return -1;
}

//Функция показа подробной информации в модальном окне
function showInfoInDialog(id) {
    //Добавляем параметры в URL
    var url = new URL(document.location);
    url.searchParams.set('id', id);
    //Устанавливаем новый адрес
    document.location = url;
}

//Закрываем модальное окно
function closeModal() {
    //Удаляем параметры из URL
    var url = new URL(document.location);
    url.searchParams.delete('id');
    //Устанавливаем новый адрес
    document.location = url;
}