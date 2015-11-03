<?php

#this file will script an email to new users upon signing up

#get email for user
$email = $_POST['user_email'];
#validate for email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $message = "The email address you have entered is not valid.";
        header("Location: http://www.toquecooks.com/index.php?errmsg=" . urlencode($message));
        var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
        exit;
    } 
$to = $email;

#get username to include with email
    $username_query = "SELECT username FROM users WHERE email = '$email' LIMIT 0,1";
    try
    {
    require_once 'db2.php';
    $result = mysqli_query($conn, $username_query);
    $username = mysqli_fetch_assoc($result);
    $uname = $username['username'];
    }
    catch (Exception $e)
    {
        echo "Could not connect to database: " . $e;
    }
    
    #compose message
    $subject = "Thanks for joining!";
    $body = "We have processed your request to join Toquecooks.com, and we think you made a great choice.\r\n";
    $body .= "\r\n";
    $body .= "Be sure to keep your password in a safe place, and in case you forget it,\r\n";
    $body .= "our signup page has a link that will allow you to reset it.\r\n";
    $body .= "\r\n";
    $body .= "We hope you will continue to keep up with us as we work to bring you the\r\n";
    $body .= "most comprehensive and enjoyable experience possible in the kitchen and beyond!\r\n";
    $headers = "From: toque.passwords@toquecooks.com" . "\r\n";

mail($to, $subject, $message, $headers);
?>
