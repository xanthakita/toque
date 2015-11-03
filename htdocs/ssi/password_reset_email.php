<?php

#this back-end sends an email to the user for password reset.
#define message parts
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


#set address from POST and send email
$subject = "toquecooks.com Password Reset Requested";
$body = "We have recently received a request for you to reset your password.\r\n";
$body .= "If you did not send this request, we recommend logging into your toquecooks account ";
$body .= "as soon as possible and changing your password.\r\n \r\n";
$body .= "If you did request a password reset, please click the following link ";
$body .= "or copy and paste it into your browser's address bar to reset your password:\r\n";
$body .= "\r\n";
$body .= "Your username is " . "$uname" . "\r\n";
$body .= "http://www.toquecooks.com/password_reset_form.php\r\n";
$body .= "\r\n";
$body .= "This is an automatically generated message from an unmonitored mailbox.\r\n";
$body .= "Please do not attempt to reply to this message directly.";
$headers = "From: toque.passwords@toquecooks.com" . "\r\n";

#send the email
try
{
    mail($to, $subject, $body, $headers);
}
catch (Exception $e)
{
    echo "Unable to process request: " . $e->getMessage();
}
echo '<p>Sent successfully. Please check your inbox to reset your password.</p>';
echo '<p><a href="http://www.toquecooks.com">Back</a></p>';
?>
