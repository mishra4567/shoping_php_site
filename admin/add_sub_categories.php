<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
$categories = '';
$sub_categories = '';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM sub_categories WHERE id='$id'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $categories = $row['categories_id'];
        $sub_categories = $row['sub_categories'];
    } else {
        header('location:./sub_categories.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['categories_id']);
    $sub_categories = get_safe_value($con, $_POST['sub_categories']);

    $result = mysqli_query($con, "SELECT * FROM sub_categories WHERE categories_id='$categories' AND sub_categories='$sub_categories'");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($result);
            if ($id == $getData['id']) {
            } else {
                $msg = "Sub Categories already exist";
            }
        } else {
            $msg = "Sub Categories already exist";
        }
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "UPDATE  sub_categories SET categories_id='$categories',sub_categories='$sub_categories' WHERE id='$id'");
        } else {
            mysqli_query($con, "INSERT INTO sub_categories(categories_id,sub_categories,status) VALUE ('$categories','$sub_categories','0')");
        }
        header('location:./sub_categories.php');
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
            <div> <a href="./sub_categories.php" class=" text-primary">...Previas</a></div>
            <div class="col-md-6 text-center">
                <div class="row">
                    <!-- <div class="col-md-6"> -->
                    <div class="card">
                        <div class="card-header"><strong>Sub Categories</strong><small>From</small></div>
                        <form method="post">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <input type="number" style="display:none;" name="status" id="" value="0">
                                    <select name="categories_id" class="form-control" id="" required>
                                        <option>Select Categories</option>
                                        <?php
                                        $res = mysqli_query($con, "SELECT * FROM categories WHERE status=1");
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            if ($row['id'] == $categories) {
                                                echo "<option value=" . $row['id'] . " selected>" . $row['categories'] . "</option>";
                                            }else{
                                                echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="sub_categories" class="form-control-label"></label>
                                    <input type="text" name="sub_categories" class="form-control" id="sub_categories" placeholder="Enter Sub categories name" value="<?php echo $sub_categories ?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control">Submit</button>
                                </div>
                            </div>
                            <div class="field_error"><?php echo $msg ?></div>
                        </form>
                    </div>
                    <!-- </div> -->
                    <div class="col-md-6"></div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- Blank End -->


        <!-- Footer Start -->
        <?php include("./footer.inc.php") ?>
        <!-- Footer End -->