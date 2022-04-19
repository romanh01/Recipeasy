<!-- Database Handler -->

<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "recipeasy";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Hi Human, I could'nt connect to the Recipeasy Database, here's why: " . mysqli_connect_error());
}
