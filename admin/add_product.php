<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");


$condition = '';
$condition1 = '';
if ($_SESSION['ADMIN_ROLE'] == 1) {
    $condition = "AND product.added_by='" . $_SESSION['ADMIN_ID'] . "'";
    $condition1 = "AND added_by='" . $_SESSION['ADMIN_ID'] . "'";
}
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$status = '';
$meta_keyword = '';
$tex = '';
$best_seller = '';
$sub_categories_id = '';
$profile_img = '';

$image_required = 'required';
$msg = '';


if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM product WHERE id='$id' $condition1 ");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($result);
        $categories_id = $row['categories_id'];
        $sub_categories_id = $row['sub_categories_id'];
        $name = $row['name'];
        $mrp = $row['mrp'];
        $price = $row['price'];
        $image = $row['image'];
        $qty = $row['qty'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
        $tex = $row['tex'];
        $best_seller = $row['best_seller'];
    } else {
        header('location:./product.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories_id = get_safe_value($con, $_POST['categories_id']);
    $sub_categories_id = get_safe_value($con, $_POST['sub_categories_id']);
    $name = get_safe_value($con, $_POST['name']);
    $mrp = get_safe_value($con, $_POST['mrp']);
    $price = get_safe_value($con, $_POST['price']);
    $qty = get_safe_value($con, $_POST['qty']);
    // $image = get_safe_value($con, $_POST['image']);
    $short_desc = get_safe_value($con, $_POST['short_desc']);
    $description = get_safe_value($con, $_POST['description']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    // $status = get_safe_value($con, $_POST['status']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
    $tex = get_safe_value($con, $_POST['tex']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $best_seller = get_safe_value($con, $_POST['best_seller']);

    $result = mysqli_query($con, "SELECT * FROM product WHERE name='$name' $condition1 ");
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($result);
            if ($id == $getData['id']) {
            } else {
                $msg = "Product already exist";
            }
        } else {
            $msg = "Product already exist";
        }
    }
    // "UPDATE  product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',
    // description='$description',meta_desc='$meta_desc',meta_keyword='$meta_keyword',tex='$tex',meta_title='$meta_title' WHERE id='$id'"

    // if($_FILES['image']['type']!=' ' && ($_FILES['image']['type']!='image/png' || $_FILES['image']['type']!='image/jpg' || $_FILES['image']['type']!='image/jpeg')){
    //     $msg="Please select only png,jpg and jpeg image formate";
    // }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image = rand(1111111111, 9999999999) . '_' . $_FILES['image']['name'];
                // move_uploaded_file($_FILES['image']['tmp_name'], '../media/product/' . $image);
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
                $update_sql = "UPDATE  product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',
                description='$description',meta_desc='$meta_desc',meta_keyword='$meta_keyword',tex='$tex',meta_title='$meta_title',image='$image',best_seller='$best_seller',
                sub_categories_id='$sub_categories_id' WHERE id='$id'";
            } else {
                $update_sql = "UPDATE  product SET categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',
                description='$description',meta_desc='$meta_desc',meta_keyword='$meta_keyword',tex='$tex',meta_title='$meta_title',best_seller='$best_seller',
                sub_categories_id='$sub_categories_id' WHERE id='$id'";
            }
            mysqli_query($con, $update_sql);
        } else {
            $image = rand(1111111111, 9999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
            mysqli_query($con, "INSERT INTO product (categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,tex,image,best_seller,sub_categories_id,added_by,status) VALUE 
            ('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','$tex','$image','$best_seller','$sub_categories_id','" . $_SESSION['ADMIN_ID'] . "','0')");
        }
        header('location:./product.php');
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
        <div class=" row bg-light rounded align-items-center justify-content-center mx-0">
            <div class="mt-3">Product <a href="./product.php" class="text-primary ">../privais</a></div>
            <div class="text-start mt-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group mt-3 ">
                                        <label for="product" class="from-control-label fw-bold">Product name</label>
                                        <input type="text" name="name" class="form-control" id="" placeholder="Enter product name" value="<?php echo $name ?>">
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="mrp" class="from-control-label fw-bold">Mrp</label>
                                        <input type="text" name="mrp" class="form-control" id="" placeholder="Enter product mrp" value="<?php echo $mrp ?>">
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="price" class="from-control-label fwold">Product price</label>
                                        <input type="text" name="price" class="form-control" id="" placeholder="Enter product price" value="<?php echo $price ?>">
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="qty" class="from-control-label fw-bold">Qty</label>
                                        <input type="text" name="qty" class="form-control" id="" placeholder="Enter product qty" value="<?php echo $qty ?>">
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="short_desc" class="from-control-label fw -bold">Short description</label>
                                        <textarea name="short_desc" class="form-control" id="" rows="5" placeholder="Enter Short description"><?php echo $short_desc ?></textarea>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="description" class="from-control-label fw-bold">Product description</label>
                                        <textarea name="description" class="form-control" id="" rows="10" placeholder="Enter Product description"><?php echo $description ?></textarea>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="meta_title" class="from-control-label fw -bold">Mete Title</label>
                                        <textarea name="meta_title" class="form-control" id="" rows="3" placeholder="Enter Product meta title"><?php echo $meta_title ?></textarea>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="meta_desc" class="from-control-label fwold">Product Meta Description</label>
                                        <textarea name="meta_desc" class="form-control" id="" rows="5" placeholder="Enter product Meta Description"><?php echo $meta_desc ?></textarea>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="meta_keyword" class="from-control-label fwbold">Product Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" id="" rows="3" placeholder="Enter product Meta Keyword"><?php echo $meta_keyword ?></textarea>
                                    </div>
                                    <div class="form-group mt-3 ">
                                        <label for="tex" class="from-control-label fw-bold">Product tex</label>
                                        <input type="number" name="tex" class="form-control" id="" placeholder="Enter product tex" value="<?php echo $tex ?>">
                                    </div>
                                    <div class="field_error"><?php echo $msg ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group mt-3 ">
                                        <label class="from-control-label fwold" for="input-img">Product Image</label>
                                        <?php if ($profile_img = $image) { ?>
                                            <img class="defolt-img" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="Product" id="profilePic">
                                        <?php } else { ?>
                                            <img class="defolt-img" src="img/default_image.jpg" alt="Product" id="profilePic">
                                        <?php } ?>
                                        <input type="file" name="image" class="form-control" id="input-img" accept="image/jpg, image/png, image/jpeg" <?php echo $image_required ?>>
                                        <label class="input-img" for="input-img">Update Image...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group mt-3 ">
                                        <label for="categories" class="from-control-label fw-bold">Categories</label>
                                        <select name="categories_id" id="categories_id" class="form-control" onchange="get_sub_cat('')" required>
                                            <option value="">Select Category</option>
                                            <?php
                                            $result = mysqli_query($con, "SELECT id,categories FROM categories WHERE STATUS='1' ORDER BY categories ASC");
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row['id'] == $categories_id) {
                                                    echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="sub_categories" class="from-control-label fw-bold">Sub Categories</label>
                                        <select name="sub_categories_id" id="sub_categories_id" class="form-control" required>
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group mt-3 ">
                                        <label for="categories" class="from-control-label fw -bold">Best Seller</label>
                                        <select name="best_seller" id="" class="form-control" required>
                                            <option value="">Select</option>
                                            <?php
                                            if ($best_seller == 1) {
                                                echo '<option value="1" selected>Yes</option>
                                              <option value="0">No</option>';
                                            } elseif ($best_seller == 0) {
                                                echo '<option value="1">Yes</option>
                                              <option value="0" selected>No</option>';
                                            } else {
                                                echo '<option value="1">Yes</option>
                                              <option value="0">No</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body card-block">
                                    <div class="form-group mt-3">
                                        <button type="submit" name="submit" class="form-control">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- Blank End -->


<!-- Footer Start -->
<?php include("./footer.inc.php") ?>
<script>
    <?php if (isset($_GET['id'])) { ?>
        get_sub_cat('<?php echo $sub_categories_id ?>');
    <?php } ?>
</script>
<!-- Footer End -->