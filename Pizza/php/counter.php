<?php
// Имя файла, в котором хранится счетчик
$file_counter = "counter.txt";

// Читаем текущее значение счетчика
//Если файл существует
if (file_exists($file_counter)) {
    //Открываем файл, считываем значение, закрываем файл
    $fp = fopen($file_counter, "r");
    $counter = fread($fp, filesize($file_counter));
    fclose($fp);
    //Иначе устанавливаем значение счетчика в 0
} else {
    $counter = 0;
}

// Увеличиваем счетчик на единицу
$counter++;

// Сохраняем обновленное значение счетчика
$fp = fopen($file_counter, "w");
fwrite($fp, $counter);
fclose($fp);

// Выводим значение счетчика на печать
echo $counter;
