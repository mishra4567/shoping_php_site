<?php
require_once('./inc/connection.inc.php');
require_once('./inc/function.inc.php');

$type = get_safe_value($con, $_POST['type']);
$otp=get_safe_value($con,$_POST['otp']);

if ($type == 'email') {
    if($otp==$_SESSION['EMAIL_OTP']){
        unset($_SESSION['EMAIL_OTP']);
        echo "done";
    }else{
        echo "no";
    }
}
if ($type == 'mobail') {
    if($otp==$_SESSION['MOBAIL_OTP']){
        unset($_SESSION['MOBAIL_OTP']);
        echo "done";
    }else{
        echo "no";
    }
}
