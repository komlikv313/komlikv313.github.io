<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$date_of_transfer = $_POST['date_of_transfer'];
$meeting_place = $_POST['meeting_place'];
$destination_place = $_POST['destination_place'];
$user_comments = $_POST['user_comments'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.by';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'freelance.vk@yandex.by'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Freelance313'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('freelance.vk@yandex.by'); // от кого будет уходить письмо?
$mail->addAddress('komlikv313@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта MyTransfer.pro';
$mail->Body    = '' .$name. ' оставил заявку, его телефон ' .$phone. 
'<br>Данные по трансферу: ' 
'<br>Дата трансфера ' .$date_of_transfer.  
'<br>Место встречи туристов ' .$meeting_place.  
'<br>Пункт назначения ' .$destination_place.
'<br>комментарии заказчика ' .$user_comments;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>