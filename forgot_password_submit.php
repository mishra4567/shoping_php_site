<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('./inc/connection.inc.php');
require_once('./inc/function.inc.php');


$email = get_safe_value($con, $_POST['email']);
$res=mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
$check_user = mysqli_num_rows($res);

if ($check_user > 0) {
    $row=mysqli_fetch_assoc($res);
    $pwd=$row['password'];
    $html = "your password is $pwd";

    // Load PHPMailer classes
    include("./PHPMailer-master/src/Exception.php");
    include("./PHPMailer-master/src/PHPMailer.php");
    include("./PHPMailer-master/src/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'gyhfvghfcvyttfyghfvgh@gmail.com';               // SMTP username
        $mail->Password   = 'pkhjxtavpqyljsic';                        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('gyhfvghfcvyttfyghfvgh@gmail.com', 'gyhfvghfcv');
        $mail->addAddress($email,);     // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Password ';
        $mail->Body    = $html;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        // $mail->addAttachment("certi_data/1718390802.pdf");

        $mail->send();
        echo "Please check your email id for password";
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Email id not register with us";
    die();
}
