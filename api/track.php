<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/track?order_id=38581928",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_HTTPGET  => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer TOKEN"
  ),
));
$SR_login_Response = curl_exec($curl);
curl_close($curl);
//$SR_login_Response_out = json_decode($SR_login_Response);
echo '<pre>';
print_r($SR_login_Response);
