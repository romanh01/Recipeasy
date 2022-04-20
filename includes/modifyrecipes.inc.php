<?php

require_once 'dbh.inc.php';

if (isset($_POST['update'])) {
    if (isset($_POST['recipenameselect'])) {
        $recipe_id = $_POST['recipenameselect'];
        // echo "<p> $recipe_id is To be updated</p>"; 

        /* Setting a cookie for selected recipe to then pass recipe_id to modifyrecipeselected.php*/
        // setcookie('recipeid', $recipe_id, time() + 86400);

        /* Setting a session variable for selected recipe to then pass recipe_id to modifyrecipeselected.php */
        session_start();
        $_SESSION["recipe_id"] = $recipe_id;

        //$recipe_id = $_COOKIE['recipeid'] ?? 'Unknown';
        //echo "$recipe_id";
        header("location: ../modifyrecipeselected.php");
        exit();
    }
} else if (isset($_POST['delete'])) {
    if (isset($_POST['recipenameselect'])) {
        $recipe_id = $_POST['recipenameselect'];
        // echo "<p> $recipe_id is To be Deleted</p>";
        $sql = "DELETE FROM recipe WHERE recipe_id = '$recipe_id'";

        $result = $conn->query($sql);

        header("location: ../modifyrecipes.php");
        exit();
    }
} else if (isset($_POST['updateme'])) {
    $recipe_name = $_POST["r_name"];
    $recipe_desc = $_POST["r_description"];
    $recipe_steps = $_POST["r_steps"];
    $recipe_rating = $_POST["r_rating"];

    session_start();
    $recipe_session_id = $_SESSION["recipe_id"];

    $sql = "UPDATE recipe
    SET 
    recipe_name = '$recipe_name',
    recipe_desc = '$recipe_desc',
    recipe_steps = '$recipe_steps',
    recipe_rating = '$recipe_rating'
    WHERE recipe_id = '$recipe_session_id'";

    $result = $conn->query($sql);

    header("location: ../modifyrecipes.php");
    exit();
} else {
    header("location: ../modifyrecipes.php");
    exit();
}
