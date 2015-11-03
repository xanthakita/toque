<?php
    $dsn = 'mysql:host=wagnerj.powwebmysql.com; dbname=toque_db';
    $username = 'toque_usr';
    $password = 'Sen!0rPr0j!';
    $options = array(PDO::ATTR_AUTOCOMMIT=>FALSE);

    try 
    {
        $db = new PDO($dsn, $username, $password, $options);
    } 
    catch (PDOException $e) 
    {
        $error_message = $e->getMessage();
        #include('database_error.php');
        echo "ISSUE: " . $error_message;
        exit();
    }

//$conn = new mysqli('wagnerj.powwebmysql.com', 'toque_usr', 'Sen!0rPr0j!', 'toque_db');
//            if (mysqli_connect_errno())
//              {
//              echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
//              exit;
//              }
?>