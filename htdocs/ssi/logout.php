<?php
session_start();

#unset $_SESSION
$_SESSION = array();
session_unset();

#destroy current session
setcookie("userid",$_COOKIE['userid'],time()-(60*60*24),"/");
session_destroy();

#redirect to main page
header("Location: http://www.toquecooks.com/index.php");

?>