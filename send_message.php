<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");

$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobail=get_safe_value($con,$_POST['mobail']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"INSERT INTO contact_us (name,email,mobail,comment,added_on) VALUE('$name','$email',$mobail','$comment','$added_on')");
echo "Thanku you";
