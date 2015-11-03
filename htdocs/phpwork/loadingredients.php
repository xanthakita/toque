<?php

error_reporting(E_ALL);  // ^ E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//echo "Before<br>";
require_once('mysql_info.php');
//echo "After<br>";


$filename="ingred.txt";
$fp=fopen($filename,"r");
$ingredblob=file_get_contents($filename);
$ingredlist=explode("\r",$ingredblob);
$ingredsize=sizeof($ingredlist);
echo "\$ingredsize = $ingredsize<br>";
for ($loop=0; $loop<$ingredsize; $loop++)
{
	// explode individual ingredient line
	$cleaned=preg_replace('/\t/', "~~", $ingredlist[$loop]);
	$data=explode('~~', $cleaned);
	$sql="Replace into Ingredients(ingredient_id, name, description) VALUES('$data[0]','$data[1]','$data[2]')";
	echo "\$sql=$sql<br><br>";
	$result=mysql_query($sql);
	
}

fclose($fp);


?>



