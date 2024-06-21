<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
include_once("./top-inc.php");
$order_id = get_safe_value($con, $_GET['id']);
if (!isset($order_id) == 0) {
?>
    <script>
        // window.location.href = 'index.php';
    </script>
 <?php
}
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Order</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
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
                                    $uid = $_SESSION['USER_ID'];
                                    $result = mysqli_query($con, "SELECT DISTINCT(order_details.id), order_details.*,product.name,product.image FROM order_details,product,`order` WHERE order_details.order_id='$order_id' 
                                        AND `order`.user_id='$uid' AND product.id=order_details.product_id");
                                    $total_price = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $total_price = $total_price + ($row['qty'] * $row['price']);
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><?php echo $row['name'] ?></td>
                                            <td class="product-add-to-cart"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH, $row['image'] ?>" alt="product image"></td>
                                            <td class="product-add-to-cart"><?php echo $row['qty'] ?></td>
                                            <td class="product-add-to-cart">$<?php echo $row['price'] ?></td>
                                            <td class="product-add-to-cart">$<?php echo $row['qty'] * $row['price'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product-add-to-cart">Total Price</td>
                                        <td class="product-add-to-cart">$<?php echo $total_price ?></td>
                                    </tr>
                                </tbody>
                                <!-- include("./tfoot.txt) -->
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("./footer-inc.php")
?>