<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
};
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
};
function get_safe_value($con, $str)
{
    if ($str != "") {
        $str=trim($str);
        return mysqli_real_escape_string($con, $str);
    }
};
function productSoldQtyByProductId($con,$pid){
    $sql="SELECT SUM(order_details.qty) AS qty FROM order_details,`order` WHERE `order`.id=order_details.order_id AND order_details.product_id=$pid AND `order`.order_status!=4";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row['qty'];
}
function isAdmin(){
    if(!isset($_SESSION['ADMIN_LOGIN'])){
        ?>
            <script>
                window.location.href='product.php';
            </script>
        <?php
    }
    if($_SESSION['ADMIN_ROLE']==1){
        ?>
            <script>
                window.location.href='product.php';
            </script>
        <?php
    }
}