<?php
header("Content-Type:text/html; charset=UTF-8");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(empty($_POST)){
    header("location:/");
}

if(isset($_POST['callme'])){
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host       = 'smtp.mail.ru';		
        $mail->SMTPAuth   = true;        
        $mail->Username   = 'bahram101@mail.ru';
        $mail->Password   = 'gnusmasgnus';		
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('bahram101@mail.ru', $name);
        $mail->addAddress('bahram101@mail.ru');
        $mail->isHTML(true);		
        $mail->Subject = 'Звоните мне';
        $mail->CharSet = 'UTF-8';
        $mail->MsgHTML(
            "Имя: ".$name."<br>Номер телефон: ".$phone);
        $mail->send();
		
        header("location:/");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
	
}else{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host       = 'smtp.mail.ru';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bahram101@mail.ru';
        $mail->Password   = 'gnusmasgnus';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('bahram101@mail.ru', $name);
        $mail->addAddress('bahram101@mail.ru');
        $mail->addReplyTo($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Сообщение';
        $mail->CharSet = 'UTF-8';
        $mail->MsgHTML(
            "Имя: ".$name."<br>
                     Email: ".$email."<br>
                     Сообщение: ".$message);
        $mail->send();
        header("location:/");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



