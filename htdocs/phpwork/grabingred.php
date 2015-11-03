<?php
error_reporting(E_ALL);  // ^ E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once('mysql_info.php');

function find_occurences($string, $find) {
	if (strpos(strtolower($string), strtolower($find)) !== FALSE) {
		$pos = -1;
		for ($i=0; $i<substr_count(strtolower($string), strtolower($find)); $i++) {
			$pos = strpos(strtolower($string), strtolower($find), $pos+1);
			$positionarray[] = $pos;
		}
		
		return $positionarray;
	}
	else {
		return FALSE;
	}

}

function findsub($blobdata, $startpos, $endpos)
{
	//echo "$blobdata<br>";
	$length=$endpos-$startpos;
	$foundstring=substr($blobdata, $startpos, $length);
	//echo "$foundstring<br>";
	return $foundstring;
}

function findid($search, $table, $var, $criteria){
	if (!(strlen($search)>0)){ $search='Whole';}
	$query="Select $var from $table where $criteria like '%$search%' LIMIT 1";
	$result=mysql_query($query);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}
	$id=mysql_fetch_array($result);

	return $id[0];
	
} 

function addingred($ingred){
	$query="Insert into Ingredients (name,description) VALUES('$ingred','To Be Defined') on duplicate KEY UPDATE name=name";
	$result=mysql_query($query);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}
	
	return TRUE;
}
//test



$filename="recipes.txt";
$fp=fopen($filename,"r");
$ingredblob=file_get_contents($filename);
$lines=explode("\r",$ingredblob);
$recipes=sizeof($lines);
//echo "recipes: $recipes<br>";
for ($x=0; $x<$recipes; $x++){
	$ing_lines=explode("|", $lines[$x]);
	$ing_rows=sizeof($ing_lines);
	$id=findid($ing_lines[0],'Recipe','recipe_id','title');
//	echo "$id: $ing_lines[0]<br>";
	for ($y=1;$y<$ing_rows;$y++){
		$components=explode(",",$ing_lines[$y]);
		$parts=sizeof($components);
		addingred($components[2]);
		//for ($z=0;$z<$parts;$z++){
			$measureid=findid(trim($components[1]),'Measurements','id','abbrv');
			$ingredid=findid(trim($components[2]),'Ingredients','ingredient_id','name');
			echo "$id, $components[0] ".findid(trim($components[1]),'Measurements','id','abbrv')." ";			echo findid(trim($components[2]),'Ingredients','ingredient_id','name');
			if (isset($components[3])){$prep=$components[3];} else {$prep="";}
	$query="Insert into components (quantity, ingredient_id, measure_id, prep, recipe_id) ";
	$query.="VALUES('$components[0]','$ingredid','$measureid','$prep','$id') on duplicate KEY UPDATE recipe_id=recipe_id";
			$result=mysql_query($query);
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}
		//}

		echo "<br>";
		
	}
}


fclose($fp);
?>