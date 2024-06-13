<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once('./inc/connection.inc.php');
require_once('./inc/function.inc.php');

$type=get_safe_value($con,$_POST['type']);

if($type=='email'){
$email=get_safe_value($con,$_POST['email']);
    $otp=rand(1111,9999);
    $html="$otp is your One Time Password";
    
    
    include('amtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Post=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="GMAIL_EMAIL_ID";
    $mail->Password="GMAIL_PASSWORD";
    $mail->SetFrom("GMAIL_EMAIL_ID");
    $mail->addAddress("TO_EMAIL_ID");
    $mail->isHTML(true);
    $mail->Subject="New Contact Us";
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        
    ))

}
?>