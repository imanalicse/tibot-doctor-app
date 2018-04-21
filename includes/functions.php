<?php
function isAuthenticated () {
    $isAuthenticated = false;
    if(isset($_SESSION['token']) && !empty($_SESSION['token'])) {
        $isAuthenticated =  true;
    }
    return $isAuthenticated;
}
function protectPage() {
    if(!isAuthenticated()){
        ob_start();
        header("location: login");
    }
}