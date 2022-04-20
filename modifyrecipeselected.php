<!-- display current data on recipe via value in form and allowing user to update data  -->
<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<section>

    <div class="signupForm">

        <h2>Update Chosen Recipe!</h2>
        <br>
        <form action="includes/modifyrecipes.inc.php" method="post">
            <?php

            /* Created in modifyrecipes.inc.php - recipe_id was assigned to a session variable */
            $recipe_session_id = $_SESSION["recipe_id"];
            $sql = "SELECT * FROM recipe WHERE recipe_id = '$recipe_session_id'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $recipe_name = $row["recipe_name"];
                $recipe_desc = $row["recipe_desc"];
                $recipe_steps = $row["recipe_steps"];
                $recipe_rating = $row["recipe_rating"];

                echo "<input type='text' name='r_name' value='$recipe_name' required>
                <input type='text' name='r_description' value='$recipe_desc' required>
                <input type='text' name='r_steps' value='$recipe_steps' required>
                <input type='text' name='r_rating' value='$recipe_rating / 100' required>";
            }
            ?>
            <input type='submit' name='updateme' value='Update me!' class='submit_button'>
        </form>
    </div>

    <br>
</section>

<!-- echo "<p3>Welcome back " . $_SESSION["recipe_id"] . " !</p3>"; -->