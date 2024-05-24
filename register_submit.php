<?php
include_once("./inc/connection.inc.php");
include_once("./inc/function.inc.php");

$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$mobail = get_safe_value($con, $_POST['mobail']);
$password = get_safe_value($con, $_POST['password']);
$check_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='$email'"));
if ($check_user > 0) {
    echo "present";
} else {
    $added_on = date('y-m-d h:i:s');
    mysqli_query($con, "INSERT INTO users (name,email,mobail,password,added_on) VALUES ('$name','$email','$mobail','$password','$added_on')");
    echo "ensert";
}
