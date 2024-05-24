<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
if(isset($_GET['type'])&& $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="DELETE FROM contact_us WHERE id='$id'";
        mysqli_query($con,$delete_sql);
    }
}
$sql="SELECT * FROM contact_us ORDER BY id DESC";
$result=mysqli_query($con,$sql);

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
            <div class="col-md-6 text-center">
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
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
                                $i=1;
                                while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Blank End -->


    <!-- Footer Start -->
    <?php include("./footer.inc.php") ?>
    <!-- Footer End -->