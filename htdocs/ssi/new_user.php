<?php

#establish connection - handle possible errors
$conn = mysqli_connect('wagnerj.powwebmysql.com', 'toque_usr', 'Sen!0rPr0j!', 'toque_db');
if (mysqli_connect_errno())
{
    $message = "There was an issue processing your request. Please try again later.";
    header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
    exit;
}

#***********Start Get Data***********#

$email = $_POST['user_email'];
$username = $_POST['user_username'];
$password = $_POST['user_password'];
$birthday_m = $_POST['user_birth_month'];
$birthday_d = $_POST['user_birth_date'];
$signup_date = $_POST['user_signup_date'];

#***********End Get Data***********#

#***********Start Data Validation/Standardization***********#

#email
    #check that field is not empty
    if (empty($email)) 
    {
        $message = "Your email address is required for signup.";
        header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
        exit;
    }
    #validate for email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $message = "The email address you have entered is not valid.";
        header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
        var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
        exit;
    } 
    #trim white space
    $email = trim($email);
    #capitalization
    $email = strtolower($email);
    #check that email address does not belong to an existing account
    $email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 0,1";
    $email_rows = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($email_rows) > 0)
    {
        $message = "Ann account has already been established for " . $email;
        $message .= ". Please reset your password if this is your email address.";
        header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
        exit;
    }
#username
    if (empty($username))
    {
        $message = "You must choose a username to be associated with your account.";
        header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
        exit;
    }
    #trim white space
    $username = trim($username);
    #check that username is not already taken in database
    $username_query = "SELECT username FROM users WHERE username = '$username' LIMIT 0,1";
    $username_rows = mysqli_query($conn, $username_query);
    if (mysqli_num_rows($username_rows) > 0)
    {
        $message = "Username " . $username . " already exists.";
        header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
        exit;
    }
#password receives sha1 encryption
    $password = sha1($password);
#birthday
    switch ($birthday_m) {
        case "January":
            $birthday_m = 1;
            break;
        case "February":
            $birthday_m = 2;
            break;
        case "March":
            $birthday_m = 3;
            break;
        case "April":
            $birthday_m = 4;
            break;
        case "May":
            $birthday_m = 5;
            break;
        case "June":
            $birthday_m = 6;
            break;
        case "July":
            $birthday_m = 7;
            break;
        case "August":
            $birthday_m = 8;
            break;
        case "Septemper":
            $birthday_m = 9;
            break;
        case "October":
            $birthday_m = 10;
            break;
        case "November":
            $birthday_m = 11;
            break;
        case "December":
            $birthday_m = 12;
            break;
    }
    $birthday = $birthday_m . "-" . $birthday_d;
#signup_date receives NO formatting

#***********End Data Validation/Standardization***********#
    
#***********Begin INSERT form data***********#
try
{
    $user_insert_query = "INSERT INTO users (username, password, signupDate, birthdate, email)
                                 VALUES ('$username', '$password', '$signup_date', '$birthday', '$email')";
}
catch (Exception $e)
{
    echo "There was an error in your query.";
}

#connect and conduct INSERT
if (!mysqli_query($conn, $user_insert_query))
{
  die('Error: ' . mysqli_error($conn));
}
$message = "You have been successfully added as a new user!";
header("Location: http://www.toquecooks.com/index.php?errmsg=" . urlencode($message));

mysqli_close($conn);

#***********End INSERT form data***********#
    
?>
