<?php
$productUrl = urlencode('https://example.com/product-details');
$productTitle = urlencode('Check out this amazing product!');

// Facebook Share URL
$facebookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=$productUrl";

// Twitter Share URL
$twitterShareUrl = "https://twitter.com/intent/tweet?text=$productTitle&url=$productUrl";

// WhatsApp Share URL
$whatsappShareUrl = "https://wa.me/?text=$productTitle%20$productUrl";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Share Product</title>
</head>
<body>
    <h1>Share This Product</h1>
    <a href="<?php echo $facebookShareUrl; ?>" target="_blank">Share on Facebook</a><br>
    <a href="<?php echo $twitterShareUrl; ?>" target="_blank">Share on Twitter</a><br>
    <a href="<?php echo $whatsappShareUrl; ?>" target="_blank">Share on WhatsApp</a><br>
</body>
</html>
