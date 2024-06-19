<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
include_once("./top-inc.php");
// if(isset($_GET['id']) && $_GET['id'] !=''){
    ?>
    <script>
        // window.location.href='index.php';
    </script>
    <?php
// }
$sub_categories='';
$cat_id = mysqli_real_escape_string($con, $_GET['id']);
if(isset($_GET['sub_categories'])){
$sub_categories = mysqli_real_escape_string($con, $_GET['sub_categories']);
}
$sort_order = '';
$price_high_selected = "";
$price_low_selected = "";
$new_selected = "";
$old_selected = "";

if (isset($_GET['sort'])) {
    $sort = mysqli_real_escape_string($con, $_GET['sort']);
    if ($sort == "price_high") {
        $sort_order = " ORDER BY product.price DESC ";
        $price_high_selected = "selected";
    }
    if ($sort == "price_low") {
        $sort_order = " ORDER BY product.price ASC ";
        $price_low_selected = "selected";
    }
    if ($sort == "new") {
        $sort_order = " ORDER BY product.id DESC ";
        $new_selected = "selected";
    }
    if ($sort == "old") {
        $sort_order = " ORDER BY product.id ASC ";
        $old_selected = "selected";
    }
}
if ($cat_id > 0) {
    $get_product = get_product($con, '', $cat_id, '', '', $sort_order,'',$sub_categories);
} else {
?>
    <script>
        window.location.href = './404.php';
    </script>
<?php
}

?>
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
                            <span class="breadcrumb-item active">Products</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <?php
            if (count($get_product) > 0) {
            ?>
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id ?>','<?php echo SITE_PATH ?>')" id="sort_product_id">
                                    <option value="">Default softing</option>
                                    <option value="price_low" <?php echo $price_low_selected ?>>Sort by low to hight</option>
                                    <option value="price_high" <?php echo $price_high_selected ?>>Sort by high to low</option>
                                    <option value="new" <?php echo $new_selected ?>>Sort by new first</option>
                                    <option value="old" <?php echo $old_selected ?>>Sort by old first</option>
                                </select>
                            </div>
                            <!-- Start List And Grid View -->
                            <ul class="view__mode" role="tablist">
                                <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                            </ul>
                            <!-- End List And Grid View -->
                        </div>
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php
                                    foreach ($get_product as $list) {
                                    ?>
                                        <!-- Start Single Category -->
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id'] ?>','add')"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id'] ?>','add')"><i class="icon-handbag icons"></i></a></li>

                                                        <!-- <li><a href="#"><i class="icon-shuffle icons"></i></a></li> -->
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.php"><?php echo $list['name'] ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$<?php echo $list['mrp'] ?></li>
                                                        <li>$<?php echo $list['price'] ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- multiple("./single-category") -->
                                    <!-- End Single Category -->
                                </div>
                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                    <div class="col-xs-12">
                                        <div class="ht__list__wrap">
                                            <!-- Start List Product -->
                                            <div class="ht__list__product">
                                                <div class="ht__list__thumb">
                                                    <a href="product-details.php"><img src="images/product-2/pro-1/1.jpg" alt="product images"></a>
                                                </div>
                                                <div class="htc__list__details">
                                                    <h2><a href="product-details.php">Product Title Here </a></h2>
                                                    <ul class="pro__prize">
                                                        <li class="old__prize">$82.5</li>
                                                        <li>$75.2</li>
                                                    </ul>
                                                    <ul class="rating">
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li><i class="icon-star icons"></i></li>
                                                        <li class="old"><i class="icon-star icons"></i></li>
                                                        <li class="old"><i class="icon-star icons"></i></li>
                                                    </ul>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    <div class="fr__list__btn">
                                                        <a class="fr__btn" href="cart.php">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End List Product -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product View -->
                    </div>

                </div>
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="htc__product__leftsidebar">
                        <!-- Start Best Sell Area -->
                        <div class="htc__recent__product">
                            <h2 class="title__line--4">best seller</h2>
                            <div class="htc__recent__product__inner">
                                <!-- Start Single Product -->
                                <div class="htc__best__product">
                                    <div class="htc__best__pro__thumb">
                                        <a href="product-details.php">
                                            <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                        </a>
                                    </div>
                                    <div class="htc__best__product__details">
                                        <h2><a href="product-details.php">Product Title Here</a></h2>
                                        <ul class="rating">
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                        </ul>
                                        <ul class="pro__prize">
                                            <li class="old__prize">$82.5</li>
                                            <li>$75.2</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- End Best Sell Area -->
                    </div>
                </div>
            <?php  } else {
            ?>
                <script>
                    window.location.href = '404.php';
                </script>
            <?php
            } ?>
        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- Start Brand Area -->

<!-- End Brand Area -->
<input type="hidden" id="qty" value="1">
<?php include_once("./footer-inc.php") ?>