<?php

error_reporting(E_ALL);  // ^ E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//echo "Before<br>";
require_once('mysql_info.php');
//echo "After<br>";


$filename="urllist2.txt";
$fp=fopen($filename,"r");
$urlblob=file_get_contents($filename);
$urllist=explode("\n",$urlblob);
$urlsize=sizeof($urllist);
//echo "$urlsize<br>";
$id=283;
for ($loop=0; $loop<$urlsize; $loop++)
{

	$thispage=file_get_contents($urllist[$loop]);
	 // a new dom object
	$dom = new domDocument('1.0', 'utf-8');
	 // load the html into the object **
	$file=@$dom->loadHTML($thispage);
	$title=$dom->getElementsByTagName('title');
	$titlestr= $title->item(0)->nodeValue;
	$img = $dom->getElementsByTagName('img')->item(0);
	$imgurl=$img->attributes->getNamedItem("src")->value;
	$filename="./images/recipe/";
	$filename.=basename($imgurl);
	//echo "$filename<br>";
	//$fh = fopen($filename, "wb");
	//$ch = curl_init($imgurl);
	//curl_setopt($ch, CURLOPT_FILE, $fh);
	//curl_exec($ch);
	//curl_close($ch);

	//$ifp = fopen($filename, 'r');
	//$data = fread($ifp, filesize($filename));
	//$data = addslashes($data);
	//fclose($ifp);

	$title_out=preg_replace('/[^a-zA-Z0-9\-\s]/', '', $titlestr);

	$sql="Replace into `Recipe_img` (recipe_id, filename) ";
	$sql.="VALUES( '$id', '$filename')";
	$id+=1;

	//echo "$title_out<br>\n";
	
	echo "$sql<br>\n";
	$result=mysql_query($sql, $link);
	if (!$result) {
	    die('Invalid Insert Query: ' . mysql_error());
	} 
	// not deleting 
	//unlink ($filename);
	
}

fclose($fp);


?>




