<?php

define(UPLOAD_DIR, "/home/users/web/b2536/pow.wagnerj/toque/htdocs/images/test/");
$max_file_size = 1024 * 2048;
$upload_dir = "/home/users/web/b2536/pow.wagnerj/toque/htdocs/images/test/";
print_r($_FILES);
if (($_FILES['myfile'])){
    $myFile = $_FILES['myfile'];
    echo "OK";
}

$name = basename($_FILES['myfile']['name']);
$name = preg_replace("/[^A-Z0-9._-]/i", "_", $name);

echo "<br>" . "<br>" . $name;
$tmpfile = $_FILES['myfile']['tmp_name'];
#passthru("chmod 666 $tmpfile");
 #passthru("mv $tmpfile ".UPLOAD_DIR."$name", $success);

 //$success = move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_dir . $name);
//$success = move_uploaded_file($tmpfile, UPLOAD_DIR . $name);

if($success){
    echo "<br>" . "<br>" . "SUCCESS";
}

#chmod(UPLOAD_DIR . $name, 666);
passthru("chmod 666 $upload_dir$name");
?>