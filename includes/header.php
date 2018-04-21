<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <?php
        define("APP_URL", "https://admin.tibot.ai/");
    ?>
    <title>Tibot Doctor App</title>
</head>
<body>

<?php
session_start();
require "functions.php";
require 'curl.php';

if (isAuthenticated()) {
?>

<div class="container">
    <div class="header">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="case-list">All cases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="my-account">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout">Logout</a>
            </li>
        </ul>
    </div>
</div>
<?php } ?>