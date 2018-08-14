<?php
//Формируем ассоциативный массив для результата
$data = array("name"=>'',"surname"=>'0',"mname"=>'', "phone"=>'',"address"=>'', "e"=>1);
if(isset($_POST['email'])) {
    $accounts_file = "../accounts.xml";
    if (file_exists($accounts_file)) {
        $usersXML = simplexml_load_file($accounts_file);
        foreach ($usersXML->user as $user) {
            //Если пользователь с указаннным email найден, устанавливаем его данные в массив
            if ((strcmp($user->email, $_POST['email']) == 0)) {
                $data['name'] = (string) ($user -> name);
                $data['surname'] = (string)($user->surname);
                $data['mname'] = (string)($user->mname);
                $data['email'] = (string)($user->email);
                $data['phone'] = (string)($user->phone);
                $data['address'] = (string)($user->address);
                $data['e'] = 0;
            }
        }
    }
}
//Конвертируем в JSON формат
$text=json_encode($data, JSON_UNESCAPED_UNICODE);
echo $text;
