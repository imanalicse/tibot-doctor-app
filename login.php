<?php
require 'includes/header.php';


$postData = array(
        "email"=> "imanali.cse@gmail.com",
        "password"=> "CodeFest%6"
);

$data = json_encode($postData);

$url =  "https://admin.tibot.ai/registeredDoctor/login";

if( isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['username']) && !empty($_POST['password'])
) {
    $user_name = $_POST["username"];
    $password = $_POST["password"];

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

    if(!empty($result)) {
        $resp = json_decode($result);
        if($resp->message == 'Auth successful') {
            $_SESSION['email'] = "imanali.cse@gmail.com";
            $_SESSION['token'] = $resp->token;
        }
    }
}


?>

<div class="container">
    <h5>Please enter your Doctor login</h5>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form" method="post">
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
