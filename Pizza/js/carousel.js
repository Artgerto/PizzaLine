
var elems;

//Установка таймера на смену картинок при первоначальной загрузке страницы
document.addEventListener("DOMContentLoaded", function (event) {
    elems = document.getElementsByClassName('carousel-item');
    setTimeout(passiveChangeCarousel, 5000);
});



//Функция смены картинки
function changeElemInCarousel() {
    for(var i=0; i < elems.length; i++) {
        if (elems[i].classList.contains('active')){
            elems[i].classList.remove('active');
            if (i == (elems.length-1)) {
                elems[0].classList.add('active');
                break;
            } else {
                elems[i+1].classList.add('active');
                break;
            }
        }
    }
}

//Функция автоматической смены картинок
function passiveChangeCarousel() {
    changeElemInCarousel();
    setTimeout(changeElemInCarousel, 5000);
}

//Функция смены картинки на предыдущую
function changeElemInCarouselAbove() {
    for(var i=0; i < elems.length; i++) {
        if (elems[i].classList.contains('active')){
            elems[i].classList.remove('active');
            if (i == 0) {
                elems[elems.length-1].classList.add('active');
                break;
            } else {
                elems[i-1].classList.add('active');
                break;
            }
        }
    }
}



