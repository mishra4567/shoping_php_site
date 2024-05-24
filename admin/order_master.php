<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
$order_id = get_safe_value($con, $_GET['id']);
if(isset($_POST['update_order_status'])){
    echo $update_order_status=$_POST['update_order_status'];
    mysqli_query($con,"UPDATE `order` SET order_status='$update_order_status' WHERE id='$order_id'");

}

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
            <div><a href="./order.php" class="text-primary">Order Details</a> Page</div>
            <div class="col-md-6 text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-remove"><span class="nobr">Product Name</span></th>
                            <th class="product-remove"><span class="nobr">Product Image</span></th>
                            <th class="product-remove"><span class="nobr">Qty</span></th>
                            <th class="product-remove"><span class="nobr">Price</span></th>
                            <th class="product-remove"><span class="nobr">Total Price</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($con, "SELECT DISTINCT(order_details.id), order_details.*,product.name,product.image, 
                        `order`.address,`order`.city,`order`.pincode,`order`.order_status
                         FROM order_details,product,`order` WHERE order_details.order_id='$order_id' 
                                        AND  product.id=order_details.product_id");
                        $total_price = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $address = $row['address'];
                            $city = $row['city'];
                            $pincode = $row['pincode'];
                            $total_price = $total_price + ($row['qty'] * $row['price']);
                            $order_status = $row['order_status'];
                        ?>
                            <tr>
                                <td class="product-add-to-cart"><?php echo $row['name'] ?></td>
                                <td class="product-add-to-cart"><img class="product_img" src="<?php echo PRODUCT_IMAGE_SITE_PATH, $row['image'] ?>" alt="product image"></td>
                                <td class="product-add-to-cart"><?php echo $row['qty'] ?></td>
                                <td class="product-add-to-cart"><?php echo $row['price'] ?></td>
                                <td class="product-add-to-cart"><?php echo $row['qty'] * $row['price'] ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3"></td>
                            <td class="product-add-to-cart">Total Price</td>
                            <td class="product-add-to-cart"><?php echo $total_price ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div id="address_details">
                <strong>Address : </strong><?php echo $address ?>,&nbsp;<strong>City : </strong><?php echo $city ?>,&nbsp;<strong>Pincode : </strong><?php echo $pincode ?><br>
                <strong>Order Status : </strong>
                <?php
                $order_status_arr = mysqli_fetch_assoc(mysqli_query($con, "SELECT order_status.name FROM order_status,`order` WHERE `order`.id='$order_id' AND `order`.order_status=order_status.id "));
                echo $order_status_arr['name'];
                ?>
            </div>

            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" name="update_order_status" id="">
                            <option value="">select status</option>
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM order_status");
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['id'] == $categories_id) {
                            ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <!-- Blank End -->
    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->