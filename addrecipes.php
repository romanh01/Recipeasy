<!-- Form to Add Recipes into recipe Table in recipeasy Database -->

<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<section>

    <div class="signupForm">

        <h2>Add a New Recipe!</h2>
        <br>
        <form action="includes/addrecipes.inc.php" method="post">
            <input type="text" name="r_name" placeholder="Recipe Name" required>
            <input type="text" name="r_description" placeholder="Recipe Description" required>
            <input type="text" name="r_steps" placeholder="Recipe Steps" required>
            <input type="text" name="r_rating" placeholder="Recipe Rating / 100" required>
            <input type="submit" name="submit" value="Add me!" class="submit_button">
        </form>
    </div>

    <br>
</section>