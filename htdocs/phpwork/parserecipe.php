<?php
require_once('mysql_info.php');
error_reporting(E_ALL);  // ^ E_NOTICE);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// usedto fill the databasetable:
/* -- I put the table definition here for quick review --
CREATE TABLE "Recipe" (
"recipie_id" INTEGER NOT NULL,
"Title" VARCHAR(255) NOT NULL,
"Source" VARCHAR(255) NULL Unknown,
"date_entered" DATE NOT NULL,
"instructions" CLOB NULL,
"servings" INTEGER NULL,
"Description" VARCHAR(255) NOT NULL,
PRIMARY KEY ("recipie_id") ,
CONSTRAINT "fk_Recipe_Recipe_img_1" FOREIGN KEY ("recipie_id") REFERENCES "Recipe_img" ("recipe_id"),
CONSTRAINT "fk_Recipe_style_1" FOREIGN KEY ("recipie_id") REFERENCES "style" ("recipie_id"),
CONSTRAINT "fk_Recipe_components_1" FOREIGN KEY ("recipie_id") REFERENCES "components" ("recipe_id")
);
*/
//$filename="http://toque.intheupstate.net/phpwork/recipes.txt";
$filename="recipes.txt";
//$filename="/home/users/web/b2536/pow.wagnerj/htdocs/phpwork/recipes.txt";
$fp=fopen($filename,"r");
$today = date('Y/m/d H:i:s');

//echo "\$context : $context<br>\n";

$endtext="-END-";
$starttext="-START-";
$startat=0;
$sql="INSERT INTO Recipe (title, source, date_entered, instructions, servings, description) VALUES (";
//$searchstring="Minted lamb pitas with red onion and tomato salad";
$searchstring="-START-";

$stream=fopen($filename, "r");
$recipeblob=fread($stream, filesize($filename));
//echo "$recipeblob<br><br><br><br><br><br><br><br><br><br>";
//echo stream_get_contents($stream, -1, 10);
$recipeblob=preg_replace('/\t+/',' ',$recipeblob);
$recipeblob=preg_replace('/.Ingredients/',".\rIngredients",$recipeblob);
//echo "$recipeblob<br><br><br><br><br><br><br><br><br><br>";
$recipeblob=preg_replace('/[\n\r]/','~~',$recipeblob);
//echo "$recipeblob<br><br><br><br><br><br><br><br><br><br>";
$recipeblob=preg_replace('-END-',"<br>",$recipeblob);



$recipelist=explode("<br>", $recipeblob);
//$recipelist=explode("<br>", $recipeblob);
$recipesize=sizeof($recipelist);
//echo "\$recipesize = $recipesize<br>\n";

for ($x=1; $x<$recipesize ; $x++) {
	//echo "---------------------------------------<br>";
	$recipeentry=explode("~~", $recipelist[$x]);
	array_shift($recipeentry);
	//print_r($recipeentry);
	//array_shift($recipeentry);
	$instructionstart=array_search('Cooking instructions', $recipeentry);
	//echo "\$instructionstart = $instructionstart<br>";
	$y=sizeof($recipeentry);
	
	//echo "\$instructionstart = $instructionstart of $y<br>";

	$sql="INSERT INTO Recipe (title, source, date_entered, instructions, servings, description) VALUES (";
	// echo "position = ".strpos($recipelist[$x],$searchstring)."<br>";	//$y=strpos()
	$author=preg_replace('/by /','',$recipeentry[2]);
	$description=preg_replace("/\'/","chr(39)", $recipeentry[6]);	//$description=preg_replace(“/[^a-zA-Z0-9\s]/”, “”, $recipeentry[6]);
	$servingpos=strpos($description,"Serves ");
	$desclen=strlen($description);
	if ($servingpos > 0) {
		$thelength=($desclen-$servingpos)*-1;
		$servingsize=substr($description, $servingpos+7);
	} else {$servingsize="4";}
	//echo "\$servingpos = $servingpos for $thelength of $desclen<br>";
	$servingsize=preg_replace("/[^0-9]/", "",$servingsize);
	//$servingsize=preg_replace("[.]", "",$servingsize);
	$sql.="'".$recipeentry[1]."',";
	$sql.="'".$author."',";
	$sql.="'".$today."',";
	$sql.="'";
	for ($q=$instructionstart+1; $q<$y-1 ; $q++){
		$sql.=$recipeentry[$q];	
	}
	
	$sql.="',";
	$sql.="'".$servingsize."',";
	$sql.="'".$description."'";
	$sql.=");";
//before loading this into the dbneed a trigger on  insert to insert a record in the image field
	echo "$sql<br>"; 
	$result=mysql_query($sql, $link);
	if (!$result) {
	    die('Invalid Insert Query: ' . mysql_error());
	}
	$result=mysql_query("select MAX(recipe_id) as recipe_id from Recipe order by Recipe_id", $link);
	if (!$result) {
	    die('Invalid Select query: ' . mysql_error());
	}
	$recipe_id = mysql_fetch_assoc($result);
	$new_id=$recipe_id['recipe_id'];
	$sql="Insert into Recipe_img (Recipe_id) Values ('$new_id')";
	$result=mysql_query($sql, $link);
	if (!$result) {
	    die('Invalid 2nd Insert Query: ' . mysql_error());
	}

}



echo "OUtside all loops at end of program.\n";
?>