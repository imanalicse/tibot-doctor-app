<?php require 'includes/header.php'; ?>

<div class="container">
    <h5>Please enter your Doctor login</h5>
    <form>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="User Name">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            Captcha here
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="forget-password.php">Forget Password</a>
</div>

<?php require 'includes/footer.php'; ?>
