<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('./inc/connection.inc.php');
require_once('./inc/function.inc.php');

$type = get_safe_value($con, $_POST['type']);

if ($type == 'email') {
    $email = get_safe_value($con, $_POST['email']);
    $check_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='$email'"));
    
    if ($check_user > 0) {
        echo "present";
        die();
    }
    $otp = rand(1111, 9999);
    $_SESSION['EMAIL_OTP'] = $otp;
    $html = "$otp is your One Time Password";


    // Load PHPMailer classes
    include("./PHPMailer-master/src/Exception.php");
    include("./PHPMailer-master/src/PHPMailer.php");
    include("./PHPMailer-master/src/SMTP.php");


    // require 'PHPMailer/src/Exception.php';

    // require 'PHPMailer/src/PHPMailer.php';
    // require 'PHPMailer/src/SMTP.php';

    // Create an instance of PHPMailer
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
        $mail->Subject = 'new OTP ';
        $mail->Body    = $html;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        // $mail->addAttachment("certi_data/1718390802.pdf");

        $mail->send();
        echo "done";
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
if($type=='mobail'){
    $number=get_safe_value($con,$_POST['mobail']);
    $check_mobail = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE mobail='$number'"));
    $mobail = get_safe_value($con, '91'.$number);

    if($check_mobail>0){
        echo "mobail_present";
        die();
    } 
    $otp = rand(1111, 9999);
    $_SESSION['MOBAIL_OTP'] = $otp;
    $message="$otp is your otp";


        // Account details
	$apiKey = urlencode('NTU2ZDYxNGE2ZDc1NGE3MjQzNTg0YTY3NWE0ZDY4Njk=');
	
	// Message details
	$numbers = array($mobail);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	// echo $response;
    echo "done";
}
