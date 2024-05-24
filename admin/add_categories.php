<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
$categories = '';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM categories WHERE id='$id'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $categories = $row['categories'];
    } else {
        header('location:./categories.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['categories']);

    $result = mysqli_query($con, "SELECT * FROM categories WHERE categories='$categories'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($result);
            if ($id == $getData['id']) {
            } else {
                $msg = "Categories already exist";
            }
        } else {
            $msg = "Categories already exist";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "UPDATE  categories SET categories='$categories' WHERE id='$id'");
        } else {
            mysqli_query($con, "INSERT INTO categories(categories,status) VALUE ('$categories','0')");
        }
        header('location:./categories.php');
        die();
    }
}

include("./sideber.inc.php")
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
            <div> <a href="./categories.php" class=" text-primary">...Previas</a></div>
            <div class="col-md-6 text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Categories</strong><small>From</small></div>
                            <form method="post">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <input type="number" style="display:none;" name="status" id="" value="0">
                                        <label for="categories" class="form-control-label"></label>
                                        <input type="text" name="categories" class="form-control" id="categories" placeholder="Enter categories name" value="<?php echo $categories ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="form-control">Submit</button>
                                    </div>
                                </div>
                                <div class="field_error"><?php echo $msg ?></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->


    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->