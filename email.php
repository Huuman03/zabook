<?php

include ("PHPMailer/src/Exception.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");
include ("PHPMailer/src/OAuth.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$mail=new PHPMailer(true);
try{
    $mail->SMTPDebug=0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username='nguyenhuuman2003@gmail.com';
    $mail->Password = 'bejthtadrkizzsxn';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet ='UTF-8';
    $mail->setFrom('nguyenhuuman2003@gmail.com');
    $mail->addAddress('nguyenhuum95@gmail.com','Huu Man');
    $mail->isHTML(true);
    $mail->Subject='thanks!';
    $mail->Body = 'cám ơn đã quan tâm!';
    $mail->send();
    $mail->AltBody = 'cố gắng ngheng';
    echo  'Email đã gửi';
    }
catch(Exception $e)
    {
        echo 'Email chưa gửi được!; ',$mail->ErrorInfo;
    }   
?>
    
</body>
</html>