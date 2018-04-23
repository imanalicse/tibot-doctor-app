<?php
function getEmail() {
    if(isset($_SESSION["email"])) {
        return $_SESSION["email"];
    }else {
        return false;
    }
}
function getToken() {
    if(isset($_SESSION["token"])) {
        return $_SESSION["token"];
    }else {
        return false;
    }
}

function isAuthenticated () {
    $isAuthenticated = false;
    if(getToken()) {
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

function is_admin() {
    return true;
    if(isset($_SESSION["is_admin"])) {
        return $_SESSION["is_admin"];
    }else{
        return false;
    }
}