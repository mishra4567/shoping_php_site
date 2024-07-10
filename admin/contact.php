<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
isAdmin();
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM contact_us WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
if (isset($_POST['de_submit'])) {
    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $query = "DELETE FROM contact_us WHERE id='$id'";
            mysqli_query($con, $query);
        }
    }
}
$sql = "SELECT * FROM contact_us ORDER BY id DESC";
$result = mysqli_query($con, $sql);

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
        <div class="row  bg-light rounded align-items-center  mx-0">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
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
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobail</th>
                                        <th>Query</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <th scope="row" class="table-data serial"><input type="checkbox" name="id[]" class="checkItem" id="" value='<?php echo $row["id"] ?>'></th>
                                            <td class="serial"><?php echo $i++ ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['mobail'] ?></td>
                                            <td><?php echo $row['comment'] ?></td>
                                            <td><?php echo $row['added_on'] ?></td>
                                            <td><?php
                                                echo "<a class='text-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>";
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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