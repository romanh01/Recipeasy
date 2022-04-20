<!-- Inserting a new recipe into the recipe table -->

<?php
if (isset($_POST["submit"])) {
    $recipe_name = $_POST["r_name"];
    $recipe_desc = $_POST["r_description"];
    $recipe_steps = $_POST["r_steps"];
    $recipe_rating = $_POST["r_rating"];

    require_once 'dbh.inc.php';

    // ? - placeholders for name, desc, steps, rating - AS using prepared statements
    $sql = "INSERT INTO recipe (recipe_name, recipe_desc, recipe_steps, recipe_rating)VALUES(?,?,?,?);";

    // Initializing a prepared statement - to prevent SQL injection
    $stmt = mysqli_stmt_init($conn);

    /* Checking if any errors in prepared statement*/
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../myaccount_signup.php?error=errorsinpreparedst");
        exit();
    }
    /* FOUR s's for 3 STRING parameters - followed after */
    mysqli_stmt_bind_param($stmt, "ssss", $recipe_name, $recipe_desc, $recipe_steps, $recipe_rating);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../index.php");
    exit();
} else {
    header("location: ../addrecipes.php");
    exit();
}
