<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
isAdmin();

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
        $update_status_sql = "UPDATE admin SET status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM admin WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
if (isset($_POST['de_submit'])) {
    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $query = "DELETE FROM admin WHERE id='$id'";
            mysqli_query($con, $query);
        }
    }
}
$sql = "SELECT * FROM admin WHERE role='1' ORDER BY id DESC"; //order by name DESC
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
            <div>Vendor master <a href="./vendor_management.php" class="text-primary">Add Vendor</a></div>
            <div class="">
                <div class="table-scroll">
                    <form method="post">
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
                                    <th class="   serial">#</th>
                                    <th class="column-ID">Name</th>
                                    <th>Password</th>
                                    <th class=" ">Email</th>
                                    <th class=" ">Mobail</th>
                                    <th class=" ">Manage</th>
                                    <!-- <th class=" ">Min Value</th> -->
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
                                        <th scope="   row" class="table-data serial"><?php echo $i++ ?></th>
                                        <td class=" table-data  "><?php echo $row['name'] ?></td>
                                        <td class="table-data"><?php echo $row['password'] ?></td>
                                        <td class=" table-data  "><?php echo $row['email'] ?></td>
                                        <td class=" table-data  "><?php echo $row['mobail'] ?></td>
                                        <td class=" table-data  "><?php echo $row['manage'] ?></td>
                                        <!-- <td class=" table-data  "><?php
                                                                        //  echo $row['cart_min_value'] 
                                                                        ?></td> -->

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
                                            echo "<a class='text-success' href='vendor_management.php?id=" . $row['id'] . "'>Edit</a>";
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