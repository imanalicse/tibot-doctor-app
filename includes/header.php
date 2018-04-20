<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Tibot Doctor App</title>
</head>
<body>

<?php
session_start();
require "functions.php";
echo "<pre>";
print_r(isAuthenticated());
echo "</pre>";
?>

<div class="container">
    <div class="header">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="case-list.php">All cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="my-account.php">My Account</a>
            </li>
            <?php if (!isAuthenticated()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>