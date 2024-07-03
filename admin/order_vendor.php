<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
// if (isset($_GET['type']) && $_GET['type'] != '') {
//     $type = get_safe_value($con, $_GET['type']);
//     if ($type == 'delete') {
//         $id = get_safe_value($con, $_GET['id']);
//         $delete_sql = "DELETE FROM categories WHERE id='$id'";
//         mysqli_query($con, $delete_sql);
//     }
// }
// $sql="SELECT * FROM users ORDER BY id DESC";
// $res=mysqli_query($con,$sql);
$vender_sql="SELECT order_details.qty,product.name,`order`.*,order_status.name AS order_status_str FROM order_details,product,`order`,order_status WHERE 
order_status.id=`order`.order_status AND product.id=order_details.product_id AND `order`.id=order_details.order_id AND
 product.added_by='".$_SESSION['ADMIN_ID']."' ORDER BY `order`.id DESC";
//  echo $vender_sql;
include("./sideber.inc.php");
?>
</div>
<!-- Sidebar End -->
<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <?php include("./top.inc.php") ?>
    <!-- Navbar End -->
    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row  bg-light rounded align-items-center justify-content-center mx-0">
            <!-- <div>Categories <a href="./add_categories.php" class="text-primary">Add Categories</a></div> -->
            <div class="col-md-6 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-remove"><span class="nobr">Order Id</span></th>
                            <th class="product-remove"><span class="nobr">Order Date</span></th>
                            <!-- <th class="product-remove"><span class="nobr">Address</span></th> -->
                            <th class="product-remove"><span class="nobr">Product Name</span></th>
                            <th class="product-remove"><span class="nobr">Payment Type</span></th>
                            <th class="product-remove"><span class="nobr">Payment Status</span></th>
                            <th class="product-remove"><span class="nobr">Order Status</span></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($con, $vender_sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td class="product-add-to-cart">
                                    <!-- <a href="./order_master.php?id=<?php echo $row['id'] ?>"> -->
                                        <?php echo $row['id'] ?>
                                    <!-- </a> -->
                                </td>
                                <td class="product-add-to-cart"><?php echo $row['added_on'] ?></td>
                                <!-- <td class="product-add-to-cart"> -->
                                    <?php
                                    //  echo $row['address'] 
                                    ?><br>
                                    <?php
                                    //  echo $row['city'] 
                                    ?><br>
                                    <?php
                                    //  echo $row['pincode'] 
                                    ?>
                                <!-- </td> -->
                                <td class="product-add-to-cart">
                                    <?php echo $row['name'] ?><br><br>
                                    QTY:-  <?php echo $row['qty'] ?>
                                </td>
                                <td class="product-add-to-cart"><?php echo $row['payment_type'] ?></td>
                                <td class="product-add-to-cart"><?php echo $row['payment_status'] ?></td>
                                <td class="product-add-to-cart"><?php echo $row['order_status_str'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <!-- include("./tfoot.txt) -->
                </table>
            </div>
        </div>
    </div>
    <!-- Blank End -->
    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->