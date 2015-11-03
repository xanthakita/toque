<?php
session_start();

#verify that user exists
    #get name and pw from float
    $login_name = $_POST['login_name'];
    $login_password = $_POST['login_password'];
    #compare to database
        #establish connection - handle possible errors
        $conn = mysqli_connect('wagnerj.powwebmysql.com', 'toque_usr', 'Sen!0rPr0j!', 'toque_db');
        if (mysqli_connect_errno())
        {
            $message = "There was an issue processing your request. Please try again later.";
            header("Location: http://www.toquecooks.com/new_user_form.php?errmsg=" . urlencode($message));
            exit;
        }
        #verify user exists
        $login_username_query = "SELECT username FROM users WHERE username = '$login_name' LIMIT 0,1";
        $login_user_rows = mysqli_query($conn, $login_username_query);
        if (mysqli_num_rows($login_user_rows) == 0)
        {
            $message = "The username you have entered does not exist. Please check your entry and try again.";
            header("Location: http://www.toquecooks.com/index.php?errmsg=" . urlencode($message));
            exit;
        }
        #compare password input to database
        $login_password_query = "SELECT password FROM users WHERE username = '$login_name' LIMIT 0,1";
        $result = mysqli_query($conn, $login_password_query);
        $db_password = mysqli_fetch_row($result);
        $p = strcmp($db_password, sha1($login_password));
        if (!$p == 0)
        {
            $message = "The password you have entered is invalid. Please check your entry and try again.";
            header("Location: http://www.toquecooks.com/index.php?errmsg=" . urlencode($message));
            exit;
        }
		
		$fname_query = "SELECT firstname FROM users WHERE username = '$login_name' LIMIT 0,1";
		$fname_result = mysqli_query($conn, $fname_query);
		$row = mysqli_fetch_assoc($fname_result);
                $_SESSION['fname'] = $row['firstname'];

#close db connection
mysqli_close($conn);

#set session cookie parameters
    #set cookie param values
    $cookie_name = 'userid';
    $cookie_value = "$login_name";
    $cookie_lifetime = strtotime('+1 hour');
    $cookie_path = '/';
    #set the cookie
    setcookie($cookie_name, $cookie_value, $cookie_lifetime, $cookie_path);

#begin the user session
session_start();

#set username in $_SESSION
$_SESSION['user_name'] = $login_name;

#header back to main page
#$message = "Currently logged in as "."$login_name";
header("Location: http://www.toquecooks.com/index.php");
?>
