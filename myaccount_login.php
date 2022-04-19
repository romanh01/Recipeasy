<!-- My account - Recipeasy Account login -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<section>

    <div class="signupForm">

        <h2>Login to Recipeasy</h2>
        <br>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Email / Username" required>
            <input type="password" name="userpass" placeholder="Password" required>
            <input type="submit" name="submit" value="Login!" class="submit_button">
        </form>
        <div class="signup_link">
            <p style="margin-left:20px">
                Not a member? <a href="myaccount_signup.php" style="text-decoration:none">Sign Up Now!</a>
            </p>
        </div>
    </div>

    <br>

    <!-- Checking Errors IN URL & displaying appropriate message -->
    <?php
    if (isset($_GET["error"])) {
        if (($_GET["error"] == "usernamedoesnotexist")) {
            echo "<p3>Username does not exist</p3>";
        } elseif (($_GET["error"] == "wrongpass")) {
            echo "<p3>Wrong Password entered</p3>";
        }
    }
    ?>

</section>

<!-- <?php
        include_once 'footer.php';
        ?> -->