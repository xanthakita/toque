<?php

$username = $_POST['username'];
$password = $_POST['password'];
$password = sha1($password);

$update_query = "UPDATE users SET password = '$password' WHERE username = '$username'";

include 'db2.php';
if(mysqli_query($conn, $update_query))
{
    $_SESSION['msg'] = "Password successfully reset!";
    header("Location: http://www.toquecooks.com/index.php");
}
else
{
    echo "There was an error with your request. Please try again.";
    echo "<br><br>";
    echo "<a href = 'http://www.toquecooks.com/index.php'>Back</a>";
}
?>
