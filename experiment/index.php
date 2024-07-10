<?php
$con = mysqli_connect("localhost", "root", "", "task-1")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
        .multi_select{
            cursor: pointer;
            text-decoration: underline !important;
            border: none;
            background: none;
            color: orange;
        }
    </style>
</head>

<body>
    <?php
        if(isset($_POST['de_submit'])){
            if(isset($_POST['id'])){
                foreach($_POST['id'] as $id){
                    $query="DELETE FROM product_data WHERE pid='$id'";
                    mysqli_query($con,$query);
                }
            }
        }
    ?>
    <form action="" method="post">
        <div class="container">
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
                        <th><input type="checkbox" id="checkAll"></th>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">quntity</th>
                        <th scope="col">price</th>
                        <th scope="col">image</th>
                        <th scope="col">tex</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
                <?php
                $data = mysqli_query($con, "SELECT * FROM product_data ")
                ?>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                        <tr>
                            <th><input type="checkbox"  class="checkItem" id="" value='<?php echo  $row["pid"] ?>' name="id[]" ></th>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $row['pid'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['quntity'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td><?php echo $row['image'] ?></td>
                            <td><?php echo $row['tex'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <!-- <script src="./jquery.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#checkAll").click(function(){
                if($(this).is(":checked")){
                    $(".checkItem").prop('checked',true);
                }else{
                    $(".checkItem").prop('checked',false);
                }
            });
        });
    </script>
</body>

</html>