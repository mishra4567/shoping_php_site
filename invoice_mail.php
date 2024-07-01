<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("./inc/connection.inc.php");
require_once("./inc/function.inc.php");

function sendInvoice($con,$order_id){

$user_id = get_safe_value($con, $order_id);
// $order_id=$_GET['id'];
$result = mysqli_query($con, "SELECT DISTINCT(order_details.id), order_details.*,product.name,product.image FROM order_details,product,`order` 
WHERE order_details.order_id='$order_id' AND product.id=order_details.product_id");

$user_order=mysqli_fetch_assoc(mysqli_query($con,"SELECT `order`.*,users.name,users.email FROM `order`,users WHERE users.id=`order`.user_id
AND `order`.id='$order_id'"));
// echo "SELECT `order`.*,users.name,users.email FROM `order`,users WHERE users.id=`order`.user_id
// AND `order`.id='$order_id'";
// prx($user_order);
$coupon_code=$user_order['coupon_code'];
$coupon_value=$user_order['coupon_value'];
if($coupon_code!=''){
  $coupon_name=$user_order['coupon_code'];
}else{
  $coupon_name="No coupon Collect";
}
if($coupon_value!=0){
  $coupon_price='-'.$coupon_value;
}else{
  $coupon_price=0;
}

$html='<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="x-apple-disable-message-reformatting" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title></title>
  <style type="text/css" rel="stylesheet" media="all">
    /* Base ------------------------------ */

    @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");

    body {
      width: 100% !important;
      height: 100%;
      margin: 0;
      -webkit-text-size-adjust: none;
    }

    a {
      color: #3869D4;
    }

    a img {
      border: none;
    }

    td {
      word-break: break-word;
    }

    .preheader {
      display: none !important;
      visibility: hidden;
      mso-hide: all;
      font-size: 1px;
      line-height: 1px;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;
    }

    /* Type ------------------------------ */

    body,
    td,
    th {
      font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
    }

    h1 {
      margin-top: 0;
      color: #333333;
      font-size: 22px;
      font-weight: bold;
      text-align: left;
    }

    h2 {
      margin-top: 0;
      color: #333333;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }

    h3 {
      margin-top: 0;
      color: #333333;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
    }

    td,
    th {
      font-size: 16px;
    }

    p,
    ul,
    ol,
    blockquote {
      margin: .4em 0 1.1875em;
      font-size: 16px;
      line-height: 1.625;
    }

    p.sub {
      font-size: 13px;
    }

    /* Utilities ------------------------------ */

    .align-right {
      text-align: right;
    }

    .align-left {
      text-align: left;
    }

    .align-center {
      text-align: center;
    }

    /* Buttons ------------------------------ */

    .button {
      background-color: #3869D4;
      border-top: 10px solid #3869D4;
      border-right: 18px solid #3869D4;
      border-bottom: 10px solid #3869D4;
      border-left: 18px solid #3869D4;
      display: inline-block;
      color: #FFF;
      text-decoration: none;
      border-radius: 3px;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
      -webkit-text-size-adjust: none;
      box-sizing: border-box;
    }

    .button--green {
      background-color: #22BC66;
      border-top: 10px solid #22BC66;
      border-right: 18px solid #22BC66;
      border-bottom: 10px solid #22BC66;
      border-left: 18px solid #22BC66;
    }

    .button--red {
      background-color: #FF6136;
      border-top: 10px solid #FF6136;
      border-right: 18px solid #FF6136;
      border-bottom: 10px solid #FF6136;
      border-left: 18px solid #FF6136;
    }

    @media only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
        text-align: center !important;
      }
    }

    /* Attribute list ------------------------------ */

    .attributes {
      margin: 0 0 21px;
    }

    .attributes_content {
      background-color: #F4F4F7;
      padding: 16px;
    }

    .attributes_item {
      padding: 0;
    }

    /* Related Items ------------------------------ */

    .related {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .related_item {
      padding: 10px 0;
      color: #CBCCCF;
      font-size: 15px;
      line-height: 18px;
    }

    .related_item-title {
      display: block;
      margin: .5em 0 0;
    }

    .related_item-thumb {
      display: block;
      padding-bottom: 10px;
    }

    .related_heading {
      border-top: 1px solid #CBCCCF;
      text-align: center;
      padding: 25px 0 10px;
    }

    /* Discount Code ------------------------------ */

    .discount {
      width: 100%;
      margin: 0;
      padding: 24px;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;
      border: 2px dashed #CBCCCF;
    }

    .discount_heading {
      text-align: center;
    }

    .discount_body {
      text-align: center;
      font-size: 15px;
    }

    /* Social Icons ------------------------------ */

    .social {
      width: auto;
    }

    .social td {
      padding: 0;
      width: auto;
    }

    .social_icon {
      height: 20px;
      margin: 0 8px 10px 8px;
      padding: 0;
    }

    /* Data table ------------------------------ */

    .purchase {
      width: 100%;
      margin: 0;
      padding: 35px 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .purchase_content {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .purchase_item {
      padding: 10px 0;
      color: #51545E;
      font-size: 15px;
      line-height: 18px;
    }

    .purchase_heading {
      padding-bottom: 8px;
      border-bottom: 1px solid #EAEAEC;
    }

    .purchase_heading p {
      margin: 0;
      color: #85878E;
      font-size: 12px;
    }

    .purchase_footer {
      padding-top: 15px;
      border-top: 1px solid #EAEAEC;
    }

    .purchase_total {
      margin: 0;
      text-align: right;
      font-weight: bold;
      color: #333333;
    }

    .purchase_total--label {
      padding: 0 15px 0 0;
    }

    body {
      background-color: #F4F4F7;
      color: #51545E;
    }

    p {
      color: #51545E;
    }

    p.sub {
      color: #6B6E76;
    }

    .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;
    }

    .email-content {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    /* Masthead ----------------------- */

    .email-masthead {
      padding: 25px 0;
      text-align: center;
    }

    .email-masthead_logo {
      width: 94px;
    }

    .email-masthead_name {
      font-size: 16px;
      font-weight: bold;
      color: #A8AAAF;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
    }

    /* Body ------------------------------ */

    .email-body {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
    }

    .email-body_inner {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
    }

    .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
    }

    .email-footer p {
      color: #6B6E76;
    }

    .body-action {
      width: 100%;
      margin: 30px auto;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
    }

    .body-sub {
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #EAEAEC;
    }

    .content-cell {
      padding: 35px;
    }

    /*Media Queries ------------------------------ */

    @media only screen and (max-width: 600px) {

      .email-body_inner,
      .email-footer {
        width: 100% !important;
      }
    }

    @media (prefers-color-scheme: dark) {

      body,
      .email-body,
      .email-body_inner,
      .email-content,
      .email-wrapper,
      .email-masthead,
      .email-footer {
        background-color: #333333 !important;
        color: #FFF !important;
      }

      p,
      ul,
      ol,
      blockquote,
      h1,
      h2,
      h3 {
        color: #FFF !important;
      }

      .attributes_content,
      .discount {
        background-color: #222 !important;
      }

      .email-masthead_name {
        text-shadow: none !important;
      }
    }
  </style>
  <!--[if mso]>
    <style type="text/css">
      .f-fallback  {
        font-family: Arial, sans-serif;
      }
    </style>
  <![endif]-->
</head>

<body>
  <span class="preheader">This is an invoice for your purchase on {{ purchase_date }}. Please submit payment by {{
    due_date }}</span>
  <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center">
        <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
          <tr>
            <td class="email-masthead">
              <a href='.SITE_PATH.' class="f-fallback email-masthead_name">
                [Product Name]
              </a>
            </td>
          </tr>
          <!-- Email Body -->
          <tr>
            <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
              <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"
                role="presentation">
                <!-- Body content -->
                <tr>
                  <td class="content-cell">
                    <div class="f-fallback">
                      <h1>Hi '.$user_order['name'].',</h1>
                      <p>Thanks for using <a href='.SITE_PATH.'>Our Website</a>. This is an invoice for your recent purchase. &nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="https://mail.google.com/">'.$user_order['email'].'</a></p>
                      
                      <!-- invoice_mail.txt -->
                      <!-- Action -->

                      <table class="purchase" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>
                            <h3>Product ID:- &nbsp;&nbsp;&nbsp;'.$user_order['id'].'</h3>
                          </td>
                          <td>
                            <h3 class="align-right">'.$user_order['added_on'].'</h3>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <th class="purchase_heading" align="left">
                                  <p class="f-fallback">Description</p>
                                </th>
                                <th class="purchase_heading" align="right">
                                  <p class="f-fallback">Amount</p>
                                </th>
                              </tr>
                              Invoice Details';
                              while($row=mysqli_fetch_assoc($result)){
                                $total_price=0;
                                $total_price = $total_price + ($row['qty'] * $row['price']);
                                $pp=$row['qty']*$row['price'];
                              $html.='
                              <tr>
                                  <td width="80%" class="purchase_item"><span class="f-fallback">'.$row['name'].'</span></td>
                                  <td class="align-right" width="20%" class="purchase_item"><span class="f-fallback">'.$pp.'</span></td>
                              </tr>
                              <tr>
                                  <td width="80%" class=""><span class="f-fallback purchase_item"></span></td>
                                  <td class="align-right" width="20%" class="purchase_item"><span class="f-fallback"></span></td>
                              </tr>';}
                              $html.='
                              <tr>
                                <td width="80%" class="purchase_footer" valign="middle">
                                  <p class="f-fallback purchase_total purchase_total--label">Coupon:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  '.$coupon_name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td width="20%" class="purchase_footer" valign="middle">
                                  <p class="f-fallback purchase_total">'.$coupon_price.'</p>
                                </td>
                              </tr>
                              <tr>
                                <td width="80%" class="purchase_footer" valign="middle">
                                  <p class="f-fallback purchase_total purchase_total--label">Total</p>
                                </td>
                                <td width="20%" class="purchase_footer" valign="middle">
                                  <p class="f-fallback purchase_total">'.$user_order['total_price'].'</p>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <p>If you have any questions about this invoice, simply reply to this email or reach out to our <a
                          href="http://localhost:8088/project/shoping_php_site/contact.php">support team</a> for help.</p>
                      <p>Cheers,
                        <br>The [Product Name] Team
                      </p>
                      <!-- Sub copy -->

                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"
                role="presentation">
                <tr>
                  <td class="content-cell" align="center">
                    <p class="f-fallback sub align-center">&copy; 2019 [Product Name]. All rights reserved.</p>
                    <p class="f-fallback sub align-center">
                      [Company Name, LLC]
                      <br>1234 Street Rd.
                      <br>Suite 1234
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>';
    // Load PHPMailer classes
    include("./PHPMailer-master/src/Exception.php");
    include("./PHPMailer-master/src/PHPMailer.php");
    include("./PHPMailer-master/src/SMTP.php");
    $mail = new PHPMailer(true);
    try {
      //Server settings
      // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'gyhfvghfcvyttfyghfvgh@gmail.com';               // SMTP username
      $mail->Password   = 'pkhjxtavpqyljsic';                        // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('gyhfvghfcvyttfyghfvgh@gmail.com', 'gyhfvghfcv');
      $mail->addAddress($user_order['email'],);     // Add a recipient

      // Content
      $mail->isHTML(true);                                        // Set email format to HTML
      $mail->Subject = 'Invoice Details';
      $mail->Body    = $html;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      // $mail->addAttachment("certi_data/1718390802.pdf");

      $mail->send();
      // echo "Please check your email id for Invoice";
    } catch (Exception $e) {
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<?php

// echo $html;