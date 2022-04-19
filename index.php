<!--Student ID: C20390201-->
<!--Name: Roman Holub Ploshko-->
<!--Project: Assignment 1 - Recipe Database-->
<!-- Index page - Main Menu Page -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<div id="container">
    <div id="main">

        <div class="card">
            <div class="card_image myAccount"> </div>
            <!-- IF SESSION SUCCESSFUL - page link changed to profile page -->
            <?php
            if (isset($_SESSION["user_id"])) {
                $login_page = "myaccount_profile.php";
                echo "<a href='$login_page'>View My Recipeasy Account</a>";
            } else {
                $profile_page = "myaccount_login.php";
                echo "<a href='$profile_page'>Login into Your Recipeasy Account</a>";
            }
            ?>
        </div>


        <div class="card">
            <div class="card_image currentRecipes"> </div>
            <a href="currentrecipes.php">Current Recipes</a>
        </div>

        <div class="card">
            <div class="card_image addRecipes"> </div>
            <a href="addrecipes.php">Add Recipes</a>
        </div>

        <div class="card">
            <div class="card_image modifyRecipes"> </div>
            <a href="modifyrecipes.php">Modify Recipes</a>
        </div>

    </div>
</div>

<?php
include_once 'footer.php';
?>