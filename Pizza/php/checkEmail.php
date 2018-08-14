<?php

$accounts_file = "../accounts.xml";

$result = 1;

//Проверка существования файла
if(file_exists($accounts_file)){
    $usersXML = simplexml_load_file($accounts_file);
    foreach ($usersXML->user as $user) {
        if ($user->email == $_POST['email']) {
            //Если email существует, то возвращаем 0
            $result = 0;
        }
    }
}

echo $result;

