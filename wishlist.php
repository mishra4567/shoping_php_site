<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
require_once("./add_to_cart.inc.php");
include_once("./top-inc.php");
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
$uid = $_SESSION['USER_ID'];
// if(isset($_GET['id'])){
//     $wid=$_GET['id'];
//     mysqli_query($con,"DELETE FROM wishlist WHERE id='$wid' AND user_id='$uid'");
// }
$res = mysqli_query($con, "SELECT product.name,product.image,product.price,product.mrp,wishlist.id FROM product,wishlist WHERE wishlist.product_id=product.id AND wishlist.user_id='$uid'");
?>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">shopping cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <?php
            // if (count($_SESSION['cart']) > 0) {
            ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">products</th>
                                        <th class="product-name">name of products</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {


                                    ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['name'] ?></a>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$<?php echo $row['mrp'] ?></li>
                                                    <li>$<?php echo $row['price'] ?></li>
                                                </ul>
                                            </td>
                                            <td class="product-remove"><a href="./wishlist.php?wishlist_id=<?php echo $row['id'] ?>"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="<?php echo SITE_PATH ?>">Continue Shopping</a>
                                    </div>
                                    <div class="buttons-cart checkout--btn">
                                        <!-- <a href="#">update</a> -->
                                        <a href="<?php echo SITE_PATH ?>checkout.php">checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            // } else {
            ?>
                <!-- <div><strong>Please enter few product in cart</strong></div> -->

            <?php
            // }
            ?>
        </div>
    </div>
</div>

<!-- cart-main-area end -->
<!-- End Banner Area -->
<!-- Start Footer Area -->
<?php include_once("./footer-inc.php") ?>