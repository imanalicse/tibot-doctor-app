<?php
require 'includes/header.php';
$error_msg = "";
if (isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['username']) && !empty($_POST['password'])
) {
    $user_name = $_POST["username"];
    $password = $_POST["password"];
    $postData = array(
        "email" => $user_name,
        "password" => $password
    );

    $url = APP_URL . "/registeredDoctor/login";
    $curl = new Curl();
    $result = $curl->post($url, $postData);

    if (!empty($result)) {
        $resp = json_decode($result);
        if ($resp->message == 'Auth successful') {
            $_SESSION['email'] = $user_name;
            $_SESSION['token'] = $resp->token;
            ob_start();
            header('Location: index.php');
        } else {
            $error_msg = $resp->message;
        }
    }
}

?>

<div class="container justify-content-center login-container">
    <h5>Please enter your Doctor Login</h5>
    <div class="row justify-content-center">
        <?php echo $error_msg; ?>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form" method="post">
        <div class="form-group row col-md-12">
            <input type="text" name="username" class="form-control full-width" placeholder="User Name">
        </div>
        <div class="form-group row col-md-12">
            <input type="password" name="password" class="form-control full-width" placeholder="Password">
        </div>
        <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-primary button-padding">Login</button>
        </div>
    </form>
    <div class="row justify-content-center">
        <a href="forget-password.php">Forget Password</a>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
