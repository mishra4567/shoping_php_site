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
        $update_status_sql = "UPDATE categories SET status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM categories WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
if (isset($_POST['de_submit'])) {
    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $query = "DELETE FROM categories WHERE id='$id'";
            mysqli_query($con, $query);
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
            <div>Categories <a href="./add_categories.php" class="text-primary">Add Categories</a></div>
            <div class="col-md-6 text-center">
                <div>
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
                                    <th scope="col" class="serial">#</th>
                                    <th scope="col" class="ID">ID</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">delete</th>
                                    <th scope="col">edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM categories categories "; //order by name DESC
                                $resultSet = $con->query($sql);
                                $i = 1;
                                while ($row = $resultSet->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row" class="table-data serial"><input type="checkbox" name="id[]" class="checkItem" id="" value='<?php echo $row["id"] ?>'></th>

                                        <th scope="row" class="serial"><?php echo $i++ ?></th>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['categories'] ?></td>
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
                                            echo "<a class='text-success' href='add_categories.php?id=" . $row['id'] . "'>Edit</a>";
                                            ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->
    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->