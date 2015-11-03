<?php
session_start();
#begin handling of image upload nonsense

#unset($_SESSION['msg']);
#define constant for maximum file size
#define('MAX_FILE_SIZE', 1024 * 1000);
$max_file_size = 1024 * 2048;
//echo "POST"; print_r($_POST);
//$_SESSION['msg'] = "TEST";
if($_FILES['upload'])
{
    //define uplaod folder
    #define('UPLOAD_DIR', './images/recipe/');
    $upload_dir = "/home/users/web/b2536/pow.wagnerj/toque/htdocs/images/recipe/";
    // replace any spaces in original filename with underscores
    $file = basename($_FILES['upload']['name']);
    $file = preg_replace("/[^A-Z0-9._-]/i", "_", $file);

    // create an array of permitted MIME types
    $permitted = array('image/jpg','image/jpeg', 'image/png');
    // upload if file is OK
  if (in_array($_FILES['upload']['type'], $permitted)
      && $_FILES['upload']['size'] > 0 
      && $_FILES['upload']['size'] <= $max_file_size) {
    switch($_FILES['upload']['error']) {
      case 0:
        // check if a file of the same name has been uploaded
        if (!file_exists($upload_dir.$file)) {
          // move the file to the upload folder and rename it
          $success = move_uploaded_file($_FILES['upload']['tmp_name'], $upload_dir . $file);
          passthru("chmod 666 $upload_dir$file");
        } else {
          $_SESSION['msg'] = 'A file of the same name already exists.';
        }
        if ($success) {
          $_SESSION['msg'] = "$file uploaded successfully.";
        } else {
          $_SESSION['msg'] = "Error uploading $file. Please try again. File move failed.";
        }
        break;
      case 3:
      case 6:
      case 7:
      case 8:
        $_SESSION['msg'] = "Error uploading $file. Please try again. CODE 8.";
        break;
      case 4:
        $_SESSION['msg'] = "You didn't select a file to be uploaded.";
      default: 
          $_SESSION['msg'] = "Giggles.";
    }
  } else {
    $_SESSION['msg'] = "$file is either too big or not a jpg or png image.";
  }
}

if($_SESSION['msg'])
{
    header("Location: http://www.toquecooks.com/cookbook.php");
}

echo "SESSION"; print_r($_SESSION);
#***********Start Get Data***********#

$recipe_title = $_POST['title'];
$recipe_author = $_POST['author'];
$recipe_date = $_POST['date_entered']; 

if($_POST['qty1'])
{
    $r = 1;
    $qty1 = $_POST['qty1'];
    $msr1 = $_POST['msr1'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr1'");
    $result = mysqli_fetch_assoc($result);
    $msr1 = $result['id'];
    $ing1 = $_POST['ing1'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing1'");
    $result = mysqli_fetch_assoc($result);
    $ing1 = $result['ingredient_id'];
    $prep1 = $_POST['prep1'];
}

if($_POST['qty2'])
{
    $r = 2;
    $qty2 = $_POST['qty2'];
    $msr2 = $_POST['msr2'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr2'");
    $result = mysqli_fetch_assoc($result);
    $msr2 = $result['id'];
    $ing2 = $_POST['ing2'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing2'");
    $result = mysqli_fetch_assoc($result);
    $ing2 = $result['ingredient_id'];
    $prep2 = $_POST['prep2'];
}

if($_POST['qty3'])
{
    $r = 3;
    $qty3 = $_POST['qty3'];
    $msr3 = $_POST['msr3'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM MeasuremSweet Sweetbackents WHERE long_name = '$msr3'");
    $result = mysqli_fetch_assoc($result);
    $msr3 = $result['id'];
    $ing3 = $_POST['ing3'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing3'");
    $result = mysqli_fetch_assoc($result);
    $ing3 = $result['ingredient_id'];
    $prep3 = $_POST['prep3'];
}

if($_POST['qty4'])
{
    $r = 4;
    $qty4 = $_POST['qty4'];
    $msr4 = $_POST['msr4'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr4'");
    $result = mysqli_fetch_assoc($result);
    $msr4 = $result['id'];
    $ing4 = $_POST['ing4'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing4'");
    $result = mysqli_fetch_assoc($result);
    $ing4 = $result['ingredient_id'];
    $prep4 = $_POST['prep4'];
}

if($_POST['qty5'])
{
    $r = 5;
    $qty5 = $_POST['qty5'];
    $msr5 = $_POST['msr5'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr5'");
    $result = mysqli_fetch_assoc($result);
    $msr5 = $result['id'];
    $ing5 = $_POST['ing5'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing5'");
    $result = mysqli_fetch_assoc($result);
    $ing5 = $result['ingredient_id'];
    $prep5 = $_POST['prep5'];
}

if($_POST['qty6'])
{
    $r = 6;
    $qty6 = $_POST['qty6'];
    $msr6 = $_POST['msr6'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr6'");
    $result = mysqli_fetch_assoc($result);
    $msr6 = $result['id'];
    $ing6 = $_POST['ing6'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing6'");
    $result = mysqli_fetch_assoc($result);
    $ing6 = $result['ingredient_id'];
    $prep6 = $_POST['prep6'];
}

if($_POST['qty7'])
{
    $r = 7;
    $qty7 = $_POST['qty7'];
    $msr7 = $_POST['msr7'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr7'");
    $result = mysqli_fetch_assoc($result);
    $msr7 = $result['id'];
    $ing7 = $_POST['ing7'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing7'");
    $result = mysqli_fetch_assoc($result);
    $ing7 = $result['ingredient_id'];
    $prep7 = $_POST['prep7'];
}

if($_POST['qty8'])
{
    $r = 8;
    $qty8 = $_POST['qty8'];
    $msr8 = $_POST['msr8'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr8'");
    $result = mysqli_fetch_assoc($result);
    $msr8 = $result['id'];
    $ing8 = $_POST['ing8'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing8'");
    $result = mysqli_fetch_assoc($result);
    $ing8 = $result['ingredient_id'];
    $prep8 = $_POST['prep8'];
}

if($_POST['qty9'])
{
    $r = 9;
    $qty9 = $_POST['qty9'];
    $msr9 = $_POST['msr9'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr9'");
    $result = mysqli_fetch_assoc($result);
    $msr9 = $result['id'];
    $ing9 = $_POST['ing9'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing9'");
    $result = mysqli_fetch_assoc($result);
    $ing9 = $result['ingredient_id'];
    $prep9 = $_POST['prep9'];
}

if($_POST['qty10'])
{
    $r = 10;
    $qty10 = $_POST['qty10'];
    $msr10 = $_POST['msr1'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT id FROM Measurements WHERE long_name = '$msr10'");
    $result = mysqli_fetch_assoc($result);
    $msr10 = $result['id'];
    $ing10 = $_POST['ing10'];
    require_once 'db2.php';
    $result = mysqli_query($conn, "SELECT ingredient_id FROM Ingredients WHERE name = '$ing10'");
    $result = mysqli_fetch_assoc($result);
    $ing10 = $result['ingredient_id'];
    $prep10 = $_POST['prep10'];
}

$recipe_instructions = $_POST['instructions'];
$recipe_serves = $_POST['serves'];
$recipe_description = $_POST['description'];

    #code tastes into variables, INSERT into db with a foreach loop
    #remember these will go into the styles table
$recipe_taste1 = $_POST['taste1'];
$recipe_taste2 = $_POST['taste2'];
$recipe_taste3 = $_POST['taste3'];

#***********End Get Data***********#
    
#***********Start Data Validation/Standardization***********#
#recipe_title    
    #Trim white space
    $recipe_title = trim($recipe_title);
    #Capitalize first letter of each word
    $recipe_title = ucfirst($recipe_title);
    #recipe_author
    #Trim white space
    #$recipe_author = trim($recipe_author);
    #Capitalize first letter of each word
    #$recipe_author = ucfirst($recipe_author);

#recipe_instructions
     #remove any leading/trailing spaces
     $recipe_instructions = trim($recipe_instructions);
     #convert HTML special chars, encode all quotes, use UTF-8 encoding, do NOT encode already-encoded HTML.
     $recipe_instructions = htmlspecialchars($recipe_instructions, ENT_QUOTES, 'UTF-8', false);
     #convert newline returns to line breaks
     $recipe_instructions = nl2br($recipe_instructions);

#recipe_serves
     #Check that value has no alpha chars
     if( !is_numeric($recipe_serves) || empty($recipe_serves) )
     {
         #the page should stop before committing to database and use echo to pass the following text
         #back to user. 
         $message = "You muct provide a numeric value for number of servings. ";
         $message .= "If you aren't completely sure, use your best approximation.";
         header("Location: http://www.toquecooks.com/new_recipe_form.php?errmsg=" . urlencode($message));
         exit;
     }
    #Trim white space
    $recipe_serves = trim($recipe_serves);

#recipe_description
    #saves to varchar(255) type. Ensure that the description is no longer than the field can hold.
    $recipe_description_length = strlen($recipe_description);
    if ($recipe_description_length > 255)
    {
        #the page should stop before committing to database and use echo to pass the following text
        #back to user. 
        $message = "Your recipe description must have fewer than 255 characters (Letters, numbers, and spaces).";
        header("Location: http://www.toquecooks.com/new_recipe_form.php?errmsg=" . urlencode($message));
        exit;
    }
    
    
    #remove any leading/trailing spaces
    $recipe_description = trim($recipe_description);
    #convert HTML special chars, encode all quotes, use UTF-8 encoding, do NOT encode already-encoded HTML.
    $recipe_description = htmlspecialchars($recipe_description, ENT_QUOTES, 'UTF-8', false);
    #convert newline returns to line breaks
    $recipe_description = nl2br($recipe_description);

#tastes
    
#***********End Data Validation/Standardization***********#


#TODO: query preps
    $new_recipe_query = "INSERT INTO Recipe (title, source, date_entered, instructions, servings, description)
        VALUES ('$recipe_title', '$recipe_author', '$recipe_date', '$recipe_instructions', '$recipe_serves', '$recipe_description')";
   
#run queries

 
 
    #establish connection
    #first INSERT INTO
    require_once 'db2.php';
    mysqli_query($conn, $new_recipe_query);
    #get id from insert
    $last_id = mysqli_insert_id($conn);
    $img_filename = $upload_dir . $file;
    #$new_recipe_image_query = "INSERT INTO Recipe_img (recipe_id, filename) VALUES ('$last_id', './images/toque_blank_greenBG.jpg')";
    $new_recipe_image_query = "INSERT INTO Recipe_img (recipe_id, uploaded_filename) VALUES ('$last_id', '$img_filename')";
    #INSERT img
    require_once 'db2.php';
    mysqli_query($conn, $new_recipe_image_query);
    #INSERT components
    switch($r) {
    case 1:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 2:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 3:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 4:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 5:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty5', '$msr5', '$ing5', '$prep5', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 6:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty5', '$msr5', '$ing5', '$prep5', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty6', '$msr6', '$ing6', '$prep6', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 7:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty5', '$msr5', '$ing5', '$prep5', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty6', '$msr6', '$ing6', '$prep6', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty7', '$msr7', '$ing7', '$prep7', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 8:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty5', '$msr5', '$ing5', '$prep5', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty6', '$msr6', '$ing6', '$prep6', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty7', '$msr7', '$ing7', '$prep7', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty8', '$msr8', '$ing8', '$prep8', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 9:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty5', '$msr5', '$ing5', '$prep5', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty6', '$msr6', '$ing6', '$prep6', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty7', '$msr7', '$ing7', '$prep7', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty8', '$msr8', '$ing8', '$prep8', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty9', '$msr9', '$ing9', '$prep9', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
    case 10:
        include 'db2.php';
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty1', '$msr1', '$ing1', '$prep1', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty2', '$msr2', '$ing2', '$prep2', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty3', '$msr3', '$ing3', '$prep3', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty4', '$msr4', '$ing4', '$prep4', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty5', '$msr5', '$ing5', '$prep5', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty6', '$msr6', '$ing6', '$prep6', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty7', '$msr7', '$ing7', '$prep7', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty8', '$msr8', '$ing8', '$prep8', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty9', '$msr9', '$ing9', '$prep9', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        $new_components_query = "INSERT INTO components (quantity, measure_id, ingredient_id, prep, recipe_id)
                                            VALUES ('$qty10', '$msr10', '$ing10', '$prep10', '$last_id' )";
        mysqli_query($conn, $new_components_query);
        break;
}
#TODO: close connection to toque db

if($recipe_taste1)
{
require_once 'db2.php';
    $taste_query = "SELECT tasteid FROM tastes WHERE factor = '$recipe_taste1'";
    $taste_res = mysqli_fetch_assoc(mysqli_query($conn, $taste_query));
    $taste_res = $taste_res['tasteid'];
    $query = "INSERT INTO style (recipe_id, factor_id) VALUES ('$last_id', '$taste_res')";
    
    mysqli_query($conn, $query);
}

if($recipe_taste2)
{
require_once 'db2.php';
    $taste_query = "SELECT tasteid FROM tastes WHERE factor = '$recipe_taste2'";
    $taste_res = mysqli_fetch_assoc(mysqli_query($conn, $taste_query));
    $taste_res = $taste_res['tasteid'];
    $query = "INSERT INTO style (recipe_id, factor_id) VALUES ('$last_id', '$taste_res')";
    
    mysqli_query($conn, $query);
}

if($recipe_taste3)
{
require_once 'db2.php';
    $taste_query = "SELECT tasteid FROM tastes WHERE factor = '$recipe_taste3'";
    $taste_res = mysqli_fetch_assoc(mysqli_query($conn, $taste_query));
    $taste_res = $taste_res['tasteid'];
    $query = "INSERT INTO style (recipe_id, factor_id) VALUES ('$last_id', '$taste_res')";
    
    mysqli_query($conn, $query);
}

#perform the approvals insert
require_once 'db2.php';
    #$image_insert_query = "INSERT INTO Recipe_img (recipe_id, uploaded_filename) VALUES ('$last_id', '$file')";
    
    #mysqli_query($conn, $image_insert_query);
// add approvals
	$recipe_approval_query = "INSERT INTO Recipe_approvals (recipe_id, recipe_approval, image_approval) VALUES('$last_id', '0', '1')";
	mysqli_query($conn, $recipe_approval_query);




header("Location: http://www.toquecooks.com/cookbook.php");

?>
