<?php

if (isset($_POST["submit"])) {
    $user_name = $_POST["username"];
    $user_pass = $_POST["userpass"];

    require_once 'dbh.inc.php';
    require_once 'signup_functions.inc.php';

    user_login($conn, $user_name, $user_pass);
} else {
    header("location: ../myaccount_login.php");
    exit();
}
