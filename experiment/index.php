<?php
// Define your test mode API keys
$api_key = 'test_f79c08d047eee86d5bf6d6f3631';
$auth_token = 'test_67dcfd7c9771f471a87e420887d';
$endpoint = 'https://test.instamojo.com/api/1.1/payment-requests/';

// Capture form data (amount, purpose, buyer_name, email, phone)
// $amount = $_POST['amount'];
// $purpose = $_POST['purpose'];
// $buyer_name = $_POST['buyer_name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];

// Prepare data for the request
// $payload = array(
//     'purpose' => $purpose,
//     'amount' => $amount,
//     'buyer_name' => $buyer_name,
//     'email' => $email,
//     'phone' => $phone,
//     'redirect_url' => 'http://your-redirect-url.com/'
// );
$payload = array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'buyer_name' => 'John Doe',
    'email' => 'foo@example.com',
    'phone' => '9999999999',
    'redirect_url' => 'http://localhost:8088/project/shoping_php_site/experiment/redirect.php',
    'send_email' => 'True',
    // 'webhook' => 'http://www.example.com/webhook/',
    'allow_repeated_payments' => 'False',
);

// Initialize cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Api-Key:$api_key", "X-Auth-Token:$auth_token"));
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));

$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response, true);

// Redirect to the payment URL
$response=json_decode($response);
echo '<pre>';
print_r($response);