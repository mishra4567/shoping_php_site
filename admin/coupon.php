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
        $update_status_sql = "UPDATE coupon_master SET status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM coupon_master WHERE id='$id'";
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
            <div>coupon master <a href="./add_coupon.php" class="text-primary">Add coupon</a></div>
            <div class="">
                <div class="table-scroll">
                    <!-- <form method="post"> -->
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr class="">
                                    <th class="   serial">#</th>
                                    <th class="column-ID">ID</th>
                                    <th class=" ">Coupon Code</th>
                                    <th class=" ">Coupon Value</th>
                                    <th class=" ">Coupon Type</th>
                                    <th class=" ">Min Value</th>
                                    <th class=" ">Status</th>
                                    <th class=" ">delete</th>
                                    <th class=" ">edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM coupon_master ORDER BY id DESC"; //order by name DESC
                                $resultSet = $con->query($sql);
                                $i = 1;
                                while ($row = $resultSet->fetch_assoc()) {
                                ?>
                                    <tr class="">
                                        <th scope="   row" class="table-data serial"><?php echo $i++ ?></th>
                                        <td class=" table-data  "><?php echo $row['id'] ?></td>
                                        <td class=" table-data  "><?php echo $row['coupon_code'] ?></td>
                                        <td class=" table-data  "><?php echo $row['coupon_value'] ?></td>
                                        <td class=" table-data  "><?php echo $row['coupon_type'] ?></td>
                                        <td class=" table-data  "><?php echo $row['cart_min_value'] ?></td>

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
                                            echo "<a class='text-success' href='add_coupon.php?id=" . $row['id'] . "'>Edit</a>";
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