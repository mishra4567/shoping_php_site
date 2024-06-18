<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
include_once("./top-inc.php");
if(!isset($_SESSION['USER_LOGIN'])){
?>
<script>
    window.location.href='index.php';
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
                                        <th class="product-remove"><span class="nobr">Order Id</span></th>
                                        <th class="product-remove"><span class="nobr">Order Date</span></th>
                                        <th class="product-remove"><span class="nobr">Address</span></th>
                                        <th class="product-remove"><span class="nobr">Payment Type</span></th>
                                        <th class="product-remove"><span class="nobr">Payment Status</span></th>
                                        <th class="product-remove"><span class="nobr">Order Status</span></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $result = mysqli_query($con, "SELECT `order`.*,order_status.name AS order_status_str FROM 
                                    `order`,order_status WHERE `order`.user_id='$uid' AND order_status.id=`order`.order_status");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a href="./myorder_details.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                                            <td class="product-add-to-cart"><?php echo $row['added_on'] ?></td>
                                            <td class="product-add-to-cart">
                                                <?php echo $row['address'] ?><br>
                                                <?php echo $row['city'] ?><br>
                                                <?php echo $row['pincode'] ?>
                                            </td>
                                            <td class="product-add-to-cart"><?php echo $row['payment_type'] ?></td>
                                            <td class="product-add-to-cart"><?php echo ucfirst($row['payment_status']) ?></td>
                                            <td class="product-add-to-cart"><?php echo $row['order_status_str'] ?></td>
                                        </tr>
                                    <?php } ?>
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