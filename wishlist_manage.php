<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
require_once("./add_to_cart.inc.php");


$pid = get_safe_value($con, $_POST['pid']);
$type = get_safe_value($con, $_POST['type']);

if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM wishlist WHERE user_id='$uid' AND product_id='$pid'")) > 0) {
        // echo "Already added";
    } else {
        // $added_on = date('y-m-d h:i:s');
        // mysqli_query($con, " INSERT INTO wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");
        wishlist_add($con,$uid,$pid);
    }
    echo $total_record=mysqli_num_rows(mysqli_query($con, "SELECT * FROM wishlist WHERE user_id='$uid'"));
} else {
    $_SESSION['WISHLIST_ID']=$pid;
    echo "not_login";
}
