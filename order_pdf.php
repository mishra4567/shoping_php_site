<?php
require_once('./vendor_tcpdf/autoload.php'); // If you used Composer
require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");
if(!isset($_SESSION['USER_ID'])){
    header("location:404.php");
}
$order_id = get_safe_value($con, $_GET['id']);
$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"SELECT coupon_value,coupon_code FROM `order` WHERE id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];
$coupon_code=$coupon_details['coupon_code'];
if($coupon_code!=''){
    $coupon_name=$coupon_details['coupon_code'];
}else{
    $coupon_name="No coupon Collect";
}
// or
// require_once('path/to/tcpdf.php'); // If you manually downloaded TCPDF

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author Name');
$pdf->SetTitle('Sample PDF');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set some HTML content

$html = '
    <body>
        <table border="1" cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<span>Product Name</span></th>
                    <th>&nbsp;&nbsp;<span>Product Image</span></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<span>Qty</span></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<span>Price</span></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<span>Total Price</span></th>
                </tr>
            </thead>
            <tbody>';
                    $uid = $_SESSION['USER_ID'];
                    $result = mysqli_query($con, "SELECT DISTINCT(order_details.id), order_details.*,product.name,product.image FROM order_details,product,`order` WHERE order_details.order_id='$order_id' 
                    AND `order`.user_id='$uid' AND product.id=order_details.product_id");
                    $total_price = 0;
                    if(mysqli_num_rows($result)==0){
                        die();
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                    $total_price = $total_price + ($row['qty'] * $row['price']);
                    $pp=$row['qty']*$row['price'];
                    $html.='<tr>
                        <td>'.$row['name'].'</td>
                        <td><img src="'. PRODUCT_IMAGE_SITE_PATH. $row['image'].'" alt="product image"></td>
                        <td>&nbsp;&nbsp;'.$row['qty'].'</td>
                        <td>&nbsp;&nbsp;$'.$row['price'].'</td>
                        <td>&nbsp;&nbsp;$'.$pp.'</td>
                    </tr>
                    <tr>
                        <td>Coupon Details:-</td>
                        <td colspan="">Coupon name:-</td>
                        <td>'.$coupon_name.'</td>
                    ';
                 }
                 if($coupon_value!=''){
                 $html.='
                        <td colspan="">Coupon Value:-</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$'.$coupon_value.'</td>
                    
                 </tr>';
                 }
                    $html.='<tr>
                        <td colspan="3"></td>
                        <td>Total Price</td>
                        <td>&nbsp;&nbsp;$'.$total_price-$coupon_value.'</td>
                    </tr>
            </tbody>
        </table>
    </body>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// Output PDF to browser
$file = __DIR__ . '/media/pdf/' . time() . '.pdf';
$pdf->Output($file, 'D');
// D=download in user's system
// I=open pdf in browser
// F=download website's folder
// S=store in variable
?>
