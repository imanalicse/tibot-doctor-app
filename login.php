<?php require 'includes/header.php'; ?>

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
