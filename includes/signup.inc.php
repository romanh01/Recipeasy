<!-- Error Handling for Sign Up form -->

<?php

/* Ensuring user submitted form correctly */
if (isset($_POST["submit"])) {
    $user_email = $_POST["email"];
    $user_name = $_POST["username"];
    $user_pass = $_POST["userpass"];
    $user_pass_repeat = $_POST["userpass_repeat"];

    require_once 'dbh.inc.php';
    require_once 'signup_functions.inc.php';

    /* Ensuring a valid Username*/
    if (invalid_username($user_name) != false) {
        header("location: ../myaccount_signup.php?error=invalidusername");
        exit();
    }
    /* If Email does'nt have an @ */
    if (invalid_email($user_email) != false) {
        header("location: ../myaccount_signup.php?error=invalidemail");
        exit();
    }
    /* If Repeat Password doesn't match Password Entered */
    if (repeat_pass($user_pass, $user_pass_repeat) != false) {
        header("location: ../myaccount_signup.php?error=invalidrepeatpass");
        exit();
    }
    /* Ensuring that username chosen is not one that already exits in the Database*/
    if (username_exists($conn, $user_name, $user_email) != false) {
        header("location: ../myaccount_signup.php?error=usernamealreadyused");
        exit();
    }
    /* If form correctly filled out - saved in a table in a database */
    create_user($conn, $user_email, $user_name,  $user_pass);
    /* Prohibiting the user from navigating to this php doc - if form was'nt submitted */
} else {
    header("location: ../myaccount_signup.php");
    exit();
}
