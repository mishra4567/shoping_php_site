<?php 
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
require_once("./add_to_cart.inc.php");

$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);

$obj=new add_to_cart();
if($type=='add'){
    $obj->addProduct($pid,$qty);
}
if($type=='remove'){
    $obj->removeProduct($pid);
}
if($type=='update'){
    $obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();

?>