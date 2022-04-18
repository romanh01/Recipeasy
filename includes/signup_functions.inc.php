<?php

/* ONLY accept a-z,A-Z,0-9*/
function invalid_username($user_name)
{
    $verdict = true;
    /* Search Algorithm for matching inputted Username*/
    if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
        $result = true;
    } else {
        $result = false;
    }
}

/* Built-in PHP function to check if Email is Valid */
function invalid_email($user_email)
{
    $verdict = true;
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
}

function repeat_pass($user_pass, $user_pass_repeat)
{
    $verdict = true;
    if ($user_pass !== $user_pass_repeat) {
        $result = true;
    } else {
        $result = false;
    }
}

function username_exists($conn, $user_name, $user_email)
{
    // ? - a placeholder
    $sql = "SELECT * FROM user WHERE user_name = ? OR user_email = ?;";
    // Initializing a prepared statement - to prevent SQL injection
    $stmt = mysqli_stmt_init($conn);

    /* Checking if any errors in prepared statement*/
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../myaccount_signup.php?error=errorsinpreparedst");
        exit();
    }
    /* TWO s's for 2 STRING parameter */
    mysqli_stmt_bind_param($stmt, "ss", $user_name, $user_email);

    mysqli_stmt_execute($stmt);

    $verdictData = mysqli_stmt_get_result($stmt);

    /* Get same username from database - if exists */
    if ($row = mysqli_fetch_assoc($verdictData)) {
        return $row;
    } else {
        $verdict = false;
        return $verdict;
    }

    mysqli_stmt_close($stmt);
}

function create_user($conn, $user_email, $user_name, $user_pass)
{
    // ? - placeholders for email, name, pass - AS using prepared statements
    $sql = "INSERT INTO user (user_email, user_name, user_pass)VALUES(?,?,?);";
    // Initializing a prepared statement - to prevent SQL injection
    $stmt = mysqli_stmt_init($conn);

    /* Checking if any errors in prepared statement*/
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../myaccount_signup.php?error=errorsinpreparedst");
        exit();
    }
    /* Hashing Password before connecting - Using default Hashing Algorithm in PHP */
    $hashed_pass = password_hash($user_pass, PASSWORD_DEFAULT);

    /* THREE s's for 3 STRING parameters - followed after */
    mysqli_stmt_bind_param($stmt, "sss", $user_email, $user_name, $hashed_pass);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../myaccount_signup.php?error=none");
    exit();
}

function userLogin($conn, $user_name, $user_pass)
{
    /* REUSING Function, user_name could be an email - OR SQL Statement will make user_email TRUE & user_name FALSE */
    $username_exists = username_exists($conn, $user_name, $user_name);

    /* IF USERNAME/EMAIL DOESN'T EXIST IN THE recipeasy Database - ERROR HANDLING */
    if ($username_exists === FALSE) {
        header("location: ../myaccount_login.php?error=usernamedoesnotexist");
        exit();
    }
    /* Checking hashed version of password user inputted by: */
    /* Using associative array to reference column name from recipeasy user table */
    $hashed_pass = $username_exists["user_pass"];

    /* Checking user-inputted pass matches with pass in user table*/
    $pass_check = password_verify($user_pass, $hashed_pass);

    if ($pass_check == FALSE) {
        header("location: ../myaccount_login.php?error=wrongpass");
        exit();
    } else if ($pass_check == TRUE) {
        session_start();
        /* Fetching users ID & username and assigning to Super Globals - to be used in sessions */
        $_SESSION["user_id"] = $username_exists["user_id"];
        $_SESSION["user_name"] = $username_exists["user_name"];

        header("location: ../index.php");
        exit();
    }
}
