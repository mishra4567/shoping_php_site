<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
// if (isset($_GET['type']) && $_GET['type'] != '') {
//     $type = get_safe_value($con, $_GET['type']);
//     if ($type == 'delete') {
//         $id = get_safe_value($con, $_GET['id']);
//         $delete_sql = "DELETE FROM categories WHERE id='$id'";
//         mysqli_query($con, $delete_sql);
//     }
// }
// $sql="SELECT * FROM users ORDER BY id DESC";
// $res=mysqli_query($con,$sql);
if(isset($_POST['de_submit'])){
    if(isset($_POST['id'])){
        foreach($_POST['id'] as $id){
            $query="DELETE FROM `order` WHERE id='$id'";
            mysqli_query($con,$query);
        }
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
            <!-- <div>Categories <a href="./add_categories.php" class="text-primary">Add Categories</a></div> -->
            <div class="col-md-6 text-center">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="serial"><input type="checkbox" name="" id="checkAll"></th>
                                <th class="product-remove"><span class="nobr">Order Id</span></th>
                                <th class="product-remove"><span class="nobr">Order Date</span></th>
                                <th class="product-remove"><span class="nobr">Address</span></th>
                                <th class="product-remove"><span class="nobr">Payment Type</span></th>
                                <th class="product-remove"><span class="nobr">Payment Status</span></th>
                                <th class="product-remove"><span class="nobr">Order Status</span></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($con, "SELECT `order`.*,order_status.name AS order_status_str FROM 
                                    `order`,order_status WHERE order_status.id=`order`.order_status");
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th scope="row" class="table-data serial"><input type="checkbox" name="id[]" class="checkItem" id="" value='<?php echo $row["id"] ?>'></th>

                                    <td class="product-add-to-cart"><a href="./order_master.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                                    <td class="product-add-to-cart"><?php echo $row['added_on'] ?></td>
                                    <td class="product-add-to-cart">
                                        <?php echo $row['address'] ?><br>
                                        <?php echo $row['city'] ?><br>
                                        <?php echo $row['pincode'] ?>
                                    </td>
                                    <td class="product-add-to-cart"><?php echo $row['payment_type'] ?></td>
                                    <td class="product-add-to-cart"><?php echo $row['payment_status'] ?></td>
                                    <td class="product-add-to-cart"><?php echo $row['order_status_str'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <!-- include("./tfoot.txt) -->
                    </table>
                </form>

            </div>
        </div>
    </div>
    <!-- Blank End -->
    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->