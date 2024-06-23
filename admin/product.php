<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
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
        $update_status_sql = "UPDATE product SET status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM product WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
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
                    <!-- <form method="post"> -->
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr class="">
                                    <th class="   serial">#</th>
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
                                    <th class=" ">Status</th>
                                    <th class=" ">delete</th>
                                    <th class=" ">edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT product.*,categories.categories FROM product,categories WHERE product.categories_id=categories.id ORDER BY product.id DESC"; //order by name DESC
                                $resultSet = $con->query($sql);
                                $i = 1;
                                while ($row = $resultSet->fetch_assoc()) {
                                ?>
                                    <tr class="">
                                        <th scope="   row" class="table-data serial"><?php echo $i++ ?></th>
                                        <td class=" table-data  "><?php echo $row['id'] ?></td>
                                        <td class=" table-data  "><?php echo $row['categories'] ?></td>
                                        <td class=" table-data  "><img class="product_img" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="Product"></td>
                                        <td class=" table-data  "><?php echo $row['name'] ?></td>
                                        <td class=" table-data  "><?php echo $row['price'] ?></td>
                                        <td class=" table-data  "><?php echo $row['mrp'] ?></td>
                                        <td class=" table-data  "><?php echo $row['qty'] ?><br><br>
                                        <?php $productSoldQtyByProductId=productSoldQtyByProductId($con,$row['id']);
                                        $pending_qty=($row['qty']-$productSoldQtyByProductId)
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
                                            if ($row['status'] == 1) {
                                                echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>&nbsp;";
                                            } else {
                                                echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>&nbsp;";
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
                    <!-- </form> -->
                </div>

            </div>
        </div>
    </div>
    <!-- Blank End -->


    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->