<!-- Simple Profile page to show user successful login status with an included log out option -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<div id="container">
    <div id="main">

        <div class="card">
            <div class="card_image myAccount">
                <?php
                if (isset($_SESSION["user_name"])) {
                    echo "<p3>Welcome back " . $_SESSION["user_name"] . " !</p3>";
                }
                ?>
            </div>
            <a href="includes/logout.inc.php">Click Me to Log Out!</a>
        </div>

    </div>
</div>