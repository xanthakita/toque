<?php

$ing_name = $_POST['ingredient_name'];
$ing_desc = $_POST['ingredient_description'];

$new_ing_query = "INSERT INTO Ingredients (name, description) VALUES ('$ing_name', '$ing_desc')";

include 'db2.php';

try
{
    (mysqli_query($conn, $new_ing_query));
}
catch(Exception $e)
{
    $_SESSION['msg'] = "There was a problem with your process. Please try again.";
    header("Location: http://www.toquecooks.com");
}

mysqli_close($conn);

header("Location: http://www.toquecooks.com/new_recipe_form.php");
?>
