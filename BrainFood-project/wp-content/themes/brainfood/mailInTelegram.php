<?php

    if (trim(!empty($_POST['teacherName']))) {
        $mailTeacherName = $_POST['teacherName'];
    }
    if (trim(!empty($_POST['name']))) {
        $name = $_POST['name'];
    }
    if (trim(!empty($_POST['lastName']))) {
        $lastName = $_POST['lastName'];
    }
    if (trim(!empty($_POST['email']))) {
        $email = $_POST['email'];
    }
    if (trim(!empty($_POST['message']))) {
        $message = $_POST['message'];
    }

    $token = "1789852950:AAEwPWo8K5rvFOVaxa50NSEdRPWevAxLY5s";
    $chat_id = "-517674923";
    $arr = [
        'Вопрос адресован:' => $mailTeacherName,
        'Имя студента: ' => $name,
        'Фамилия студента: ' => $lastName,
        'Email:' => $email,
        'Вопрос:' => $message
    ];

    foreach($arr as $key => $value) {
      $txt .= "<b>".$key."</b> ".$value."%0A";
    };

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


    if ($sendToTelegram) {
        $messege = 'Ошибка';
    }
    else {
        $messege = 'Данные отправлены';
    }
    $responseEmail = ['message' => $messege];
    header('Content-type: application/json');
    echo json_encode($responseEmail);


?>