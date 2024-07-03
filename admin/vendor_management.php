<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
isAdmin();
$name = '';
$email = '';
$password = '';
$mobail = '';
// $status = '';
$manage = '';



$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM admin WHERE id='$id'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $mobail = $row['mobail'];
        // $status = $row['status'];
        $manage = $row['manage'];

    } else {
        header('location:./vendor.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);
    $mobail = get_safe_value($con, $_POST['mobail']);
    // $status = get_safe_value($con, $_POST['status']);
    $manage = get_safe_value($con, $_POST['manage']);


    $result = mysqli_query($con, "SELECT * FROM admin WHERE name='$name'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($result);
            if ($id == $getData['id']) {
            } else {
                $msg = "User Name already exist";
            }
        } else {
            $msg = "User Name already exist";
        }
    }
   
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
                $update_sql = "UPDATE  admin SET name='$name',email='$email',password='$password',mobail='$mobail',manage='$manage' WHERE id='$id'";
                mysqli_query($con, $update_sql);
        } else {
                mysqli_query($con, "INSERT INTO admin(name,email,password,mobail,manage,role,status) VALUES('$name','$email','$password','$manage','$mobail','1','0')");
        }
        header('location:./vendor.php');
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
            <div class="mt-3">Vendor <a href="./vendor.php" class="text-primary ">../view Page</a></div>
            <div class="text-start mt-3">
                <div class="card">
                    <div class="card-body card-block">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group mt-3 ">
                                <label for="manage" class="from-control-label fw-bold">Manage Name</label>
                                <input type="text" name="manage" class="form-control" id="" placeholder="Enter manage name" value="<?php echo $manage ?>">
                            </div>
                            <div class="form-group mt-3 ">
                                <label for="name" class="from-control-label fw-bold">Vendor Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Enter name" value="<?php echo $name ?>">
                            </div>
                            <div class="form-group mt-3 ">
                                <label for="email" class="from-control-label fw-bold">Vendor's Email</label>
                                <input type="text" name="email" class="form-control" id="" placeholder="Enter email" value="<?php echo $email ?>">
                            </div>
                            <!-- include admin_vendor_management.txt -->
                            <div class="form-group mt-3 ">
                                <label for="mobail" class="from-control-label fw-bold">Vendor's Mobail Number</label>
                                <input type="text" name="mobail" class="form-control" id="" placeholder="Enter Mobail Number" value="<?php echo $mobail ?>">
                            </div>
                            <div class="form-group mt-3 ">
                                <label for="password" class="from-control-label fw-bold">Enter Password</label>
                                <input type="text" name="password" class="form-control" id="" placeholder="Enter password" value="<?php echo $password ?>">
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