<?php
include_once("./inc/connection.inc.php");
include_once("./inc/function.inc.php");

unset ($_SESSION['USER_LOGIN']);
unset ($_SESSION['USER_ID']);
unset ($_SESSION['USER_NAME']);

header('location:./index.php');
die();