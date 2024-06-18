<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
};
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
};
function get_safe_value($con, $str)
{
    if ($str != "") {
        $str = trim($str);
        return mysqli_real_escape_string($con, $str);
    }
};

function get_product(
    $con,
    $limit = '',
    $cat_id = '',
    $product_id = '',
    $search_str = '',
    $sort_order='',
    $is_best_seller=''
) {
    $sql = "SELECT product.*,categories.categories FROM product,categories WHERE product.status=1";
    if ($cat_id != '') {
        $sql .= " AND product.categories_id='$cat_id' ";
    }
    if ($product_id != '') {
        $sql .= " AND product.id='$product_id' ";
    }
    if ($is_best_seller!= '') {
        $sql .= " AND product.best_seller=1 ";
    }
    $sql .= " AND product.categories_id=categories.id ";
    if ($search_str != '') {
        $sql .= " AND (product.name LIKE '%$search_str%' OR product.description LIKE '%$search_str%') ";
    }
    if ($sort_order != '') {
        $sql .= $sort_order ;
    } else {
        $sql .= " ORDER BY product.id DESC ";
    }

    if ($limit != '') {
        $sql .= " LIMIT $limit ";
    }
    // echo $sql;
    $result = mysqli_query($con, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
function wishlist_add($con,$uid,$pid){
    $added_on = date('Y-m-d h:i:s');
    mysqli_query($con, " INSERT INTO wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");

}
