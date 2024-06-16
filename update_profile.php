<?php
require_once('./inc/connection.inc.php');
require_once('./inc/function.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?PHP
}
$name = get_safe_value($con, $_POST['name']);
$uid=$_SESSION['USER_ID'];
mysqli_query($con,"UPDATE users SET name='$name' WHERE id='$uid'");
$_SESSION['USER_NAME']=$name;
echo "Your name Updated";
