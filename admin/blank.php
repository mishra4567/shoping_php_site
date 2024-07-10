<?php
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
if(isset($_POST['de_submit'])){
    if(isset($_POST['id'])){
        foreach($_POST['id'] as $id){
            $query="DELETE FROM product WHERE id='$id'";
            mysqli_query($con,$query);
        }
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
                                    <th class=" ">tex</th>
                                    <th class=" ">Best Seller</th>
                                    <th class=" ">Status</th>
                                    <th class=" ">delete</th>
                                    <th class=" ">edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <th scope="row" class="table-data serial"><input type="checkbox" name="id[]" class="checkItem" id="" value='<?php echo $row["id"] ?>'></th>
                                <th>jhj</th>
                                <th>iuyuih</th>
                                <th>iuyhui</th>
                                <th>98yui</th>
                                <th>iuyhjk</th>
                                <th>87yiiuy</th>
                                <th>iuyhjk</th>
                                <th>i8yuhj</th>
                                <th>8i7uyh</th>
                                <th>98iuyj</th>
                                <th>87iyuh</th>
                                <th>8iuj</th>
                                <th>8iuhj</th>
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