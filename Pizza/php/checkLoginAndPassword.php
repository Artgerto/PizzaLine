<?php

$accounts_file = "../accounts.xml";

$result = 0;

//Проверка существования файла
if(file_exists($accounts_file)){
    $usersXML = simplexml_load_file($accounts_file);
    foreach ($usersXML -> user as $user) {
        if ((strcmp($user->email, $_POST['email'])==0) && (strcmp($user->password, $_POST['password'])==0) ) {
            //Если пользователь с таким логином и паролем найден, возвращаем 1
            $result = 1;
        }
    }
}

echo $result;