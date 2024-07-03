<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
isAdmin();
$coupon_code = '';
$coupon_value = '';
$coupon_type = '';
$cart_min_value = '';


$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM coupon_master WHERE id='$id'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $coupon_code = $row['coupon_code'];
        $coupon_value = $row['coupon_value'];
        $coupon_type = $row['coupon_type'];
        $cart_min_value = $row['cart_min_value'];
    } else {
        header('location:./coupon.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $coupon_code = get_safe_value($con, $_POST['coupon_code']);
    $coupon_value = get_safe_value($con, $_POST['coupon_value']);
    $coupon_type = get_safe_value($con, $_POST['coupon_type']);
    $cart_min_value = get_safe_value($con, $_POST['cart_min_value']);

    $result = mysqli_query($con, "SELECT * FROM coupon_master WHERE coupon_code='$coupon_code'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($result);
            if ($id == $getData['id']) {
            } else {
                $msg = "Coupon Code already exist";
            }
        } else {
            $msg = "Coupon Code already exist";
        }
    }
   
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
                $update_sql = "UPDATE  coupon_master SET coupon_code='$coupon_code',coupon_value='$coupon_value',coupon_type='$coupon_type' WHERE id='$id'";
                mysqli_query($con, $update_sql);
        } else {
                mysqli_query($con, "INSERT INTO coupon_master(coupon_code,coupon_value,coupon_type,cart_min_value,status) VALUES('$coupon_code','$coupon_value','$coupon_type','$cart_min_value','0')");
        }
        header('location:./coupon.php');
        die();
    }
}

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
            <div class="mt-3">Product <a href="./coupon.php" class="text-primary ">../view coupon</a></div>
            <div class="text-start mt-3">
                <div class="card">
                    <div class="card-body card-block">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group mt-3 ">
                                <label for="coupon_code" class="from-control-label fw-bold">Coupon Code</label>
                                <input type="text" name="coupon_code" class="form-control" id="" placeholder="Enter coupon code" value="<?php echo $coupon_code ?>">
                            </div>
                            <div class="form-group mt-3 ">
                                <label for="coupon_value" class="from-control-label fw-bold">Coupon Value</label>
                                <input type="text" name="coupon_value" class="form-control" id="" placeholder="Enter coupon Value" value="<?php echo $coupon_value ?>">
                            </div>
                            <div class="form-group mt-3 ">
                                <label for="coupon_type" class="from-control-label fw -bold">Coupon Type</label>
                                <select name="coupon_type" id="" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                    if ($coupon_type == 'Percentage') {
                                        echo '<option value="Percentage" selected>Percentage</option>
                                              <option value="Rupee">Rupee</option>';
                                    } elseif ($coupon_type == 'Rupee') {
                                        echo '<option value="Percentage">Percentage</option>
                                              <option value="Rupee" selected>Rupee</option>';
                                    } else {
                                        echo '<option value="Percentage">Percentage</option>
                                              <option value="Rupee">Rupee</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mt-3 ">
                                <label for="cart_min_value" class="from-control-label fw-bold">Cart minimam value</label>
                                <input type="text" name="cart_min_value" class="form-control" id="" placeholder="Enter cart minimam value" value="<?php echo $cart_min_value ?>">
                            </div>
                            
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="form-control">Submit</button>
                            </div>
                            <div class="field_error"><?php echo $msg ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->


    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    
    <!-- Footer End -->