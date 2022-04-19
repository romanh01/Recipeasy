<!-- Form to Modify recipe Table Values - View Current, Insert New -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<section>

    <div class="signupForm">

        <h2>Choose a Recipe to modify</h2>
        <br>
        <form action="includes/modifyrecipes.inc.php" method="post">
            <select name="recipenameselect[]">
                <?php

                $sql = "SELECT * FROM recipe";
                $result = $conn->query($sql);

                /* Only row with column name - recipe_name is inserted after fetch to insert as an option in form */
                while ($row = $result->fetch_assoc()) {
                    $this_row = $row["recipe_name"];
                    echo "<option value='recipe_name'>$this_row</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" name="update" value="Update" class="submit_button" style="background-color:#03C03C">
            <input type="submit" name="delete" value="Delete" class="submit_button" style="background-color:red">
        </form>

    </div>

</section>