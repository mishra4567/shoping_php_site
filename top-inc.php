<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
require_once("./add_to_cart.inc.php");
$wishlist_count = 0;
$cat_res = mysqli_query($con, "SELECT * FROM categories WHERE status=1");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

if (isset($_SESSION['USER_LOGIN'])) {
    $uid = $_SESSION['USER_ID'];
    if (isset($_GET['wishlist_id'])) {
        $wid = get_safe_value($con, $_GET['wishlist_id']);
        mysqli_query($con, "DELETE FROM wishlist WHERE id='$wid' AND user_id='$uid'");
    }
    $wishlist_count = mysqli_num_rows(mysqli_query($con, "SELECT product.name,product.image,product.price,product.mrp,wishlist.id FROM product,wishlist WHERE wishlist.product_id=product.id AND wishlist.user_id='$uid'"));
}

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];

$meta_title = "Ecom Web";
$meta_desc = "Shopping";
$meta_keyword = "";
$meta_url=SITE_PATH;
$meta_image="";
if ($mypage == 'product-details.php') {
    $product_id = get_safe_value($con, $_GET['id']);
    $product_meta = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product WHERE id='$product_id'"));
    $meta_title = $product_meta['meta_title'];
    $meta_desc = $product_meta['meta_desc'];
    $meta_keyword = $product_meta['meta_keyword'];
    $meta_image_name = $product_meta['image'];
    $meta_url=SITE_PATH.'product-details.php?id='.$product_id;
    $meta_image=PRODUCT_IMAGE_SITE_PATH.$meta_image_name;
}
if ($mypage == 'contact.php') {
    $meta_title = "Contact Us";
}
// echo $_SESSION['MOBAIL_OTP'];
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title ?></title>
    <meta name="description" content="<?php echo $meta_desc ?>">
    <meta name="keywords" content="<?php echo $meta_keyword ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- sosial media property -->
    <meta property="og:title" content="<?php echo $meta_title ?>">
    <meta property="og:image" content="<?php echo $meta_image ?>">
    <meta property="og:url" content="<?php echo $meta_url ?>">
    <meta property="og:site_name" content="<?php echo SITE_PATH ?>">
    <!--  -->
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <?php foreach ($cat_arr as $list) { ?>
                                            <li class="drop"><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a>
                                                <?php
                                                $cat_id = $list['id'];
                                                $sub_cat_res = mysqli_query($con, "SELECT * FROM sub_categories WHERE status='1' AND categories_id='$cat_id'");
                                                if (mysqli_num_rows($sub_cat_res) > 0) {
                                                ?>
                                                    <ul class="dropdown">
                                                        <?php
                                                        while ($sub_cat_rows = mysqli_fetch_assoc($sub_cat_res)) {
                                                            echo '<li><a href="categories.php?id=' . $list['id'] . '&sub_categories=' . $sub_cat_rows['id'] . '">' . $sub_cat_rows['sub_categories'] . '</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                        <!-- include("./nav-bar.txt") -->
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <?php foreach ($cat_arr as $list) { ?>
                                                <li class="drop"><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                                            <?php } ?> <!-- include(./mobail-nav-bar.txt) -->
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a class="a_line" title="Search" href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        <?php if (isset($_SESSION['USER_LOGIN'])) {
                                        ?>
                                            <ul class="main__menu ">
                                                <li class="drop"><a class="a_line_before" href="#"><i class="icon-user "></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="./wishlist.php"> wishlist &nbsp;<i class="icon-heart icons"></i></a></li>
                                                        <li><a href="./myorder.php"> My Order &nbsp;<i class="icon-basket-loaded"></i></a></li>
                                                        <li><a href="./profile.php"> Profile &nbsp;<i class="icon-user"></i></a></li>
                                                        <li><a href="./logout.php">Log Out &nbsp; <i class="icon-logout icons"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="a_line" title="Login/Register" href="./login2nd.php"><i class="icon-login icons"></i></a>
                                        <?php } ?>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <!-- <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a> -->
                                        <a class="" href="./cart.php"><i class="icon-handbag icons"></i></a>
                                        <a title="Cart" href="./cart.php"><span class="htc__qua"><?php echo $totalProduct ?></span></a>
                                    </div>
                                    <?php if (isset($_SESSION['USER_ID'])) { ?>
                                        <div class="htc__shopping__wish">
                                            <!-- <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a> -->
                                            <a class="" href="./wishlist.php"><i class="icon-heart icons"></i></a>
                                            <a title="Cart" href="./wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count ?></span></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <!-- <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.php">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.php">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.php">Checkout</a></li>
                    </ul>
                </div>
            </div> -->
            <!-- End Cart Panel -->
        </div>