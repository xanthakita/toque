<?php
$conn = mysqli_connect('wagnerj.powwebmysql.com', 'toque_usr', 'Sen!0rPr0j!', 'toque_db');
if (mysqli_connect_errno())
{
    $message = "There was an issue processing your request. Please try again later.";
    header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
    exit;
}
?>
