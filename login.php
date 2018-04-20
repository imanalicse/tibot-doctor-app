<?php
session_start();
require 'includes/header.php';

function postRequest($url, $data, $refer = "", $timeout = 10, $header = [])
{
    $curlObj = curl_init();
    $ssl = stripos($url,'https://') === 0 ? true : false;
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_AUTOREFERER => 1,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)',
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_0,
        CURLOPT_HTTPHEADER => ['Expect:'],
        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        CURLOPT_REFERER => $refer
    ];
    if (!empty($header)) {
        $options[CURLOPT_HTTPHEADER] = $header;
    }
    if ($refer) {
        $options[CURLOPT_REFERER] = $refer;
    }
    if ($ssl) {
        //support https
        $options[CURLOPT_SSL_VERIFYHOST] = false;
        $options[CURLOPT_SSL_VERIFYPEER] = false;
    }
    curl_setopt_array($curlObj, $options);
    $returnData = curl_exec($curlObj);
    if (curl_errno($curlObj)) {
        //error message
        $returnData = curl_error($curlObj);
    }
    curl_close($curlObj);
    return $returnData;
}

$postData = array(
        "email"=> "imanali.cse@gmail.com",
        "password"=> "CodeFest%6"
);

$data = json_encode($postData);

$url =  "https://admin.tibot.ai/registeredDoctor/login";
//$postRes = postRequest($url, $postData);
//echo '<pre>';
//print_r($postRes);
//echo '</pre>';

if(!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    $ch = curl_init($url);
# Setup request to send json via POST.
//$payload = json_encode( array( "customer"=> $data ) );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Get data from https url
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
# Send request.
    $result = curl_exec($ch);
    curl_close($ch);

    echo "curl called";
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if(!empty($result)) {
    $resp = json_decode($result);
    if($resp->message == 'Auth successful') {
        $_SESSION['email'] = "imanali.cse@gmail.com";
        $_SESSION['token'] = $resp->token;
     }
}

?>

<div class="container">
    <h5>Please enter your Doctor login</h5>
    <form id="login-form">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="User Name">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            Captcha here
        </div>
        <input type="submit" class="btn btn-primary" value="Login">
    </form>
    <a href="forget-password.php">Forget Password</a>
</div>

<?php require 'includes/footer.php'; ?>
