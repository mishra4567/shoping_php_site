<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");

$condition = '';
$condition1 = '';
if ($_SESSION['ADMIN_ROLE'] == 1) {
    $condition = "AND product.added_by='" . $_SESSION['ADMIN_ID'] . "'";
    $condition1 = "AND added_by='" . $_SESSION['ADMIN_ID'] . "'";
}


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status_sql = "UPDATE product SET status='$status' WHERE id='$id' $condition1 ";
        mysqli_query($con, $update_status_sql);
    }
    if ($type == 'best_seller') {
        $bestSeller = get_safe_value($con, $_GET['bestSeller']);
        $id = get_safe_value($con, $_GET['id']);
        if ($bestSeller == 'active') {
            $best_seller = '1';
        } else {
            $best_seller = '0';
        }
        $update_bestSeller_sql = "UPDATE product SET best_seller='$best_seller' WHERE id='$id' $condition1";
        mysqli_query($con, $update_bestSeller_sql);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM product WHERE id='$id' $condition1 ";
        mysqli_query($con, $delete_sql);
        // unlink();
    }
}
if(isset($_POST['de_submit'])){
    if(isset($_POST['id'])){
        foreach($_POST['id'] as $id){
            $query="DELETE FROM product WHERE id='$id'";
            mysqli_query($con,$query);
        }
    }
}
$sql = "SELECT product.*,categories.categories FROM product,categories WHERE product.categories_id=categories.id $condition ORDER BY product.id DESC"; //order by name DESC
include("./sideber.inc.php");
?>
<style>

</style>
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
            <div>Product <a href="./add_product.php" class="text-primary">Add Product</a></div>
            <div class="">
                <div class="table-scroll">
                    <form action="" method="post">
                        <table class="table">
                            <tr>
                                <td><label for="checkAll" class="multi_select ">Select all</label></td>
                                <td>Multi Action:-</td>
                                <!-- <td><input type="submit" name="submit" class="multi_select text-success" value="Best Seller all" onclick="return confirm('Are you sure want to delete')"></td> -->
                                <td><input type="submit" name="de_submit" class="multi_select text-danger" value="Delete all" onclick="return confirm('Are you sure want to delete')"></td>
                                <!-- <td><input type="submit" name="se_submit" class="multi_select text-primary" value="Status all" onclick="return confirm('Are you sure want to delete')"></td> -->
                            </tr>
                        </table>
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr class="">
                                    <th class="serial"><input type="checkbox" name="" id="checkAll"></th>
                                    <th class="serial">#</th>
                                    <th class="column-ID">ID</th>
                                    <th class=" ">Categories Id</th>
                                    <th class=" ">image</th>
                                    <th class=" ">name</th>
                                    <th class=" ">mrp</th>
                                    <th class=" ">price</th>
                                    <th class=" ">qty</th>
                                    <!-- <th class="column ">short_desc</th> -->
                                    <!-- <th class="column ">Description</th> -->
                                    <!-- <th class="column ">meta_title</th> -->
                                    <!-- <th class="column ">meta_desc</th> -->
                                    <!-- <th class="column ">meta_keyword</th> -->
                                    <th class=" ">tex</th>
                                    <th class=" ">Best Seller</th>
                                    <th class=" ">Status</th>
                                    <th class=" ">delete</th>
                                    <th class=" ">edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $resultSet = $con->query($sql);
                                $i = 1;
                                while ($row = $resultSet->fetch_assoc()) {
                                ?>
                                    <tr class="">
                                        <th scope="row" class="table-data serial"><input type="checkbox" name="id[]" class="checkItem" id="" value='<?php echo $row["id"] ?>'></th>
                                        <th scope="row" class="table-data serial"><?php echo $i++ ?></th>
                                        <td class=" table-data  "><?php echo $row['id'] ?></td>
                                        <td class=" table-data  "><?php echo $row['categories'] ?></td>
                                        <td class=" table-data  "><img class="product_img" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="Product"></td>
                                        <td class=" table-data  "><?php echo $row['name'] ?></td>
                                        <td class=" table-data  "><?php echo $row['price'] ?></td>
                                        <td class=" table-data  "><?php echo $row['mrp'] ?></td>
                                        <td class=" table-data  "><?php echo $row['qty'] ?><br><br>
                                            <?php $productSoldQtyByProductId = productSoldQtyByProductId($con, $row['id']);
                                            $pending_qty = ($row['qty'] - $productSoldQtyByProductId)
                                            ?>
                                            Pending Qty:<?php echo $pending_qty ?>
                                        </td>
                                        <!-- <td class=" table-data  "><?php
                                                                        // echo $row['short_desc']
                                                                        ?></td> -->
                                        <!-- <td class=" table-data  "><?php
                                                                        // echo $row['description'] 
                                                                        ?></td> -->
                                        <!-- <td class=" table-data  "><?php
                                                                        // echo $row['meta_title'] 
                                                                        ?></td> -->
                                        <!-- <td class=" table-data  "><?php
                                                                        // echo $row['meta_desc'] 
                                                                        ?></td> -->
                                        <!-- <td class=" table-data  "><?php
                                                                        // echo $row['meta_keyword'] 
                                                                        ?></td> -->
                                        <td class=" table-data  "><?php echo $row['tex'] ?></td>
                                        <td><?php
                                            if ($row['best_seller'] == 1) {
                                                echo "<a class='text-success' href='?type=best_seller&bestSeller=deactive&id=" . $row['id'] . "'>Active</a>&nbsp;";
                                            } else {
                                                echo "<a class='text-info'    href='?type=best_seller&bestSeller=active&id=" . $row['id'] . "'>Deactive</a>&nbsp;";
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($row['status'] == 1) {
                                                echo "<a class='text-primary' href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>&nbsp;";
                                            } else {
                                                echo "<a class='text-secondary' href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>&nbsp;";
                                            }
                                            ?></td>
                                        <td><?php
                                            echo "<a class='text-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>";

                                            ?></td>
                                        <td><?php
                                            echo "<a class='text-success' href='add_product.php?id=" . $row['id'] . "'>Edit</a>";
                                            ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->


    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->