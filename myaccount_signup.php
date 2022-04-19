<!-- My account - Recipeasy Sign Up Page -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<section>

    <div class="signupForm">

        <h2>Join Recipeasy today!</h2>
        <br>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="userpass" placeholder="Password" required>
            <input type="password" name="userpass_repeat" placeholder="Re-Enter Password" required>
            <input type="submit" name="submit" value="Sign Up!" class="submit_button">
            <!-- <input type="button" name ="submit" value="Sign Up!"> -->
            <!-- <button type="button" name="submit" Sign Up!</button> -->
        </form>

        <p2>By clicking the Sign Up button, you agree to our <br>
            &emsp; &emsp; &emsp; &emsp; &ensp;
            <a href="#" style=font-size:10px>terms & conditions</a> and <a href="#" style=font-size:10px>Privacy Policy</a>
        </p2>
    </div>

    <br>

    <!-- Checking Errors IN URL & displaying appropriate message -->
    <?php
    if (isset($_GET["error"])) {
        if (($_GET["error"] == "invalidusername")) {
            echo "<p3>Username can ONLY be alphanumeric</p3>";
        } elseif (($_GET["error"] == "invalidemail")) {
            echo "<p3>This Email does not exist, make sure this an actual Email</p3>";
        } elseif (($_GET["error"] == "invalidrepeatpass")) {
            echo "<p3>Passwords did not match</p3>";
        } elseif (($_GET["error"] == "usernamealreadyused")) {
            echo "<p3>This Username is taken, try another one</p3>";
        } elseif (($_GET["error"] == "errorsinpreparedst")) {
            echo "<p3>Oh, Oh, Something went wrong!</p3>";
        } elseif (($_GET["error"] == "none")) {
            echo "<p3>Signed Up for a Recipeasy Account!</p3>";
        }
    }
    ?>

</section>



<!-- <?php
        include_once 'footer.php';
        ?> -->