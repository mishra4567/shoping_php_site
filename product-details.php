<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
ob_start();
include_once("./top-inc.php");
if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    if ($product_id > 0) {
        $get_product = get_product($con, '', '', $product_id);
    } else {
?>
        <script>
            window.location.href = './index.php';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
$main_url = urlencode($meta_url);
$main_title = urlencode($meta_title);
$facebookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=$main_url";
$twitterShareUrl = "https://twitter.com/intent/tweet?text=$main_title&url=$main_url";
$whatsappShareUrl = "https://wa.me/?text=$main_title%20$main_url";
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
                            <a class="breadcrumb-item" href="./categories.php?id=<?php echo $get_product['0']['categories_id'] ?>"><?php echo $get_product['0']['categories'] ?></a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $get_product['0']['name'] ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>" alt="full-image">
                                </div>
                            </div>
                        </div>
                        <!-- End Product Big Images -->

                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2><?php echo $get_product['0']['name'] ?></h2>
                        <ul class="pro__prize">
                            <li class="old__prize">$<?php echo $get_product['0']['mrp'] ?></li>
                            <li>$<?php echo $get_product['0']['price'] ?></li>
                        </ul>
                        <p class="pro__info"><?php echo $get_product['0']['short_desc'] ?></p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <?php
                                $productSoldQtyByProductId = productSoldQtyByProductId($con, $get_product['0']['id']);
                                $pending_qty = ($get_product['0']['qty'] - $productSoldQtyByProductId);
                                $cart_show = 'yes';
                                if ($get_product['0']['qty'] > $productSoldQtyByProductId) {
                                    $stock = 'In Stock';
                                } else {
                                    $stock = 'Not in Stock';
                                    $cart_show = '';
                                }
                                ?>
                                <p><span>Availability:</span><?php echo $stock ?> </p>
                            </div>
                            <div class="htc__select__option">
                                <p><span>Qty:</span></p>
                                <?php if ($cart_show != '') { ?>
                                    <p>
                                        <select class="ht__select" id="qty">
                                            <?php for ($i = 1; $i <= $pending_qty; $i++) { ?>
                                                <option><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Categories:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="#"><?php echo $get_product['0']['categories'] ?>,</a></li>
                                </ul>
                            </div>
                            <?php if ($cart_show != '') { ?>
                                <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')">Add To Cart</a>
                                <a class="fr__btn fr__btn_buy" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add','yes')">Buy Now</a>
                            <?php } ?>
                        </div>
                        <div id="social_share_box">
                            <a target="_blank" href="<?php echo $facebookShareUrl ?> " class="social-icon" alt=""><img src="./images/icons/download.png" alt=""></a>
                            <a target="_blank" href="<?php echo $whatsappShareUrl ?> " class="whats-social-icon"><img src="./images/icons/download (1).png" alt=""></a>
                            <a target="_blank" href="<?php echo $twitterShareUrl ?>" class="social-icon"><img src="./images/icons/12452418.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                            <h4 class="ht__pro__title">Description</h4>
                            <p><?php echo $get_product['0']['description'] ?></p>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                            <h4 class="ht__pro__title">Standard Featured</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in</p> -->
                        </div>
                    </div>
                    <!-- End Single Content -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->
<!-- Start Product Area -->
<?php
// unset($_COOKIE['recently_viewed']);
if (isset($_COOKIE['recently_viewed'])) {
    // pr(unserialize($_COOKIE['recently_viewed']));
    $arrRecentView = unserialize($_COOKIE['recently_viewed']);
    $countRecentView = count($arrRecentView);
    $countStartRecentView = $countRecentView - 4;
    if ($countRecentView > 4) {
        $arrRecentView = array_slice($arrRecentView, $countStartRecentView, 4);
    }
    // pr($arrRecentView);
    $recentViewId = implode(",", $arrRecentView);
?>
    <section class="htc__product__area--2 pb--100 product-details-res">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">Recently Viewed</h2>
                        <p>But I must explain to you how all this mistaken idea</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__wrap clearfix">
                    <?php

                    $rCVSqlRes = mysqli_query($con, "SELECT * FROM product WHERE id IN ($recentViewId)");
                    while ($list = mysqli_fetch_assoc($rCVSqlRes)) {
                    ?>
                        <!-- Start Single Product -->
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
                    <?php  } ?>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
<?php
    $arrRec = unserialize($_COOKIE['recently_viewed']);
    if (($key = array_search($product_id, $arrRec)) !== false) {
        unset($arrRec[$key]);
    }
    $arrRec[] = $product_id;
    setcookie('recently_viewed', serialize($arrRec), time() + 60 * 60 * 24 * 365);
} else {
    $arrRec[] = $product_id;
    setcookie('recently_viewed', serialize($arrRec), time() + 60 * 60 * 24 * 365);
}

// $_COOKIE['recently_viewed']=$product_id;
?>

<!-- End Product Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->
<?php include_once("./footer-inc.php");
ob_flush();
?>