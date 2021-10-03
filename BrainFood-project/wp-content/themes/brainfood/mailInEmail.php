<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->setLanguage('ru', 'PHPMailer/language/');
    $mail->IsHTML(true);


    try {

        $mail->isMail();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '489257mihail@gmail.com';                     
        $mail->Password   = '789654123$Mihail$';                               
        $mail->SMTPSecure = 'ssl';         
        $mail->Port       = 587;                              


        //от кого
        $mail->setFrom('489257mihail@gmail.com', 'Сообщение от образовательной платформы');

        //обрабатываем email преподавателя
        if (trim(!empty($_POST['teacherEmail']))) {
            $mailTeacher = $_POST['teacherEmail'];
        }
        //кому письмо
        $mail->addAddress($mailTeacher);     
    
        //тема письма
        $mail->Subject = 'Сообщение от образовательной платформы';
        $body  = '<h1>Это сообщение присланно образовательной платформой BrainFood"</h1>';   

        if (trim(!empty($_POST['name']))) {
            $body .= '<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
        }
        if (trim(!empty($_POST['lastName']))) {
            $body .= '<p><strong>Фамилия:</strong> '.$_POST['lastName'].'</p>';
        }
        if (trim(!empty($_POST['email']))) {
            $body .= '<p><strong>email:</strong> '.$_POST['email'].'</p>';
        }
        if (trim(!empty($_POST['message']))) {
            $body .= '<p><strong>Вопрос:</strong> '.$_POST['message'].'</p>';
        }


        $mail->Body = $body;

        //отпрака письма
        if (!$mail->send()) {
            $messege = 'Ошибка';
        }
        else {
            $messege = 'Данные отправлены';
        }

        $responseEmail = ['message' => $messege];

        header('Content-type: application/json');
        echo json_encode($responseEmail);

    
    } catch (Exception $e) {
        echo "Сообщение не может быть отправлено. Ошибка почтовой программы: {$mail->ErrorInfo}";
    }
?>