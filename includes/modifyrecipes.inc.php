<?php

if (isset($_POST["update"])) {

    $recipe_name = (isset($_POST['recipenameselect']) ? $_POST['recipenameselect'] : null);
    print("city is: " . $recipe_name[0]);
    echo " is To be updated";
} else if (isset($_POST["delete"])) {
    $recipe_name = $_POST["recipenameselect"];
    echo $recipe_name;
    echo " is To be Deleted";
} else {
    header("location: ../modifyrecipes.php");
    exit();
}
