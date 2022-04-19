<!-- Displays current Recipes and their associated data descriptions -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<div id="container">
    <div id="main">
        <?php

        $sql = "SELECT * FROM recipe";
        $result = $conn->query($sql);
        /* Each column-rows are printed on a new card */
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>
            <h2>" . $row["recipe_name"] . "</h2>
            <br>
            <br>
            <p3 style = margin:0;>Description:<p3>
            <br>
            <p4 style = color:#444c38;>" . $row["recipe_desc"] . "</p4>
            <br>
            <br>
            <p3 style = margin:0;>Cooking Steps:<p3>
            <br>
            <p4 style = color:#444c38;>" . $row["recipe_steps"] . "</p4>
            <br>
            <br>
            <p5 style = margin-left:20;>Rating: <p5>
            <p5 style = color:#000036;>" . $row["recipe_rating"] . "</p5>
            <br>
            <br>

            </div>";
        }
        ?>

    </div>
</div>

<?php
include_once 'footer.php';
?>