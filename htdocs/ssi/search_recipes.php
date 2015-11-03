<?php
session_start();

#OCCURRENCE COUNT FUNC
function array_count_values_of($v, $a) {
    $counts = array_count_values($a);
    return $counts[$v];
}

#***********Start Get Data***********#
unset($search_title);
unset($search_description);
unset($search_taste1);
unset($search_taste2);
unset($search_taste3);
$_SESSION['domdoc']="";
$valid_search = 0;
if (isset($_POST['title'])) {$search_title = $_POST['title'];}
if (isset($_POST['description'])) {$search_description = $_POST['description'];} 



    #Get taste id based on taste name passed in
    #$taste1_id_query = "SELECT tasteid FROM tastes WHERE factor LIKE '%Entree%'";
$mysqli = new mysqli("wagnerj.powwebmysql.com", "toque_usr", "Sen!0rPr0j!", "toque_db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
/*
if (isset($_POST['taste1'])) {$search_taste1 = $_POST['taste1'];
$t1_result = mysqli_query($mysqli, "SELECT tasteid FROM tastes WHERE factor LIKE '%$search_taste1%'");
#get id for taste 1
$t1 = mysqli_fetch_array($t1_result); }
if (isset($_POST['taste2'])) {$search_taste2 = $_POST['taste2'];
$t2_result = mysqli_query($mysqli, "SELECT tasteid FROM tastes WHERE factor LIKE '%$search_taste2%'");
#get id for taste 2
$t2 = mysqli_fetch_array($t2_result);}
if (isset($_POST['taste3'])) {$search_taste3 = $_POST['taste3'];
$t3_result = mysqli_query($mysqli, "SELECT tasteid FROM tastes WHERE factor LIKE '%$search_taste3%'");
#get id for taste 3
$t3 = mysqli_fetch_array($t3_result);}
*/

#***********End Get Data***********#

#***********Start Assorted Query Stuff***********#
/*

JOIN Recipe_approvals Ra ON Ra.recipe_id = R.recipe_id
WHERE
Ra.recipe_approval != 1

*/
#these queries will return recipe ids for later use
if (strlen($search_title)>0){
#$search_title_query = "SELECT recipe_id FROM Recipe WHERE title LIKE '%$search_title%'";
$search_title_query = "SELECT R.recipe_id FROM Recipe R JOIN Recipe_approvals Ra ON Ra.recipe_id = R.recipe_id
WHERE R.title LIKE '%$search_title%' AND Ra.recipe_approval != 1";
$valid_search=1;}
if (strlen($search_description) >0){
#$search_description_query = "SELECT recipe_id FROM Recipe WHERE description LIKE '%$search_description%'";
$search_description_query = "SELECT R.recipe_id FROM Recipe R JOIN Recipe_approvals Ra ON Ra.recipe_id = R.recipe_id
WHERE Ra.recipe_approval != 1 AND R.description LIKE '%$search_description%'";
$valid_search=1;}

/*
$search_taste1_query = "SELECT recipe_id FROM style WHERE factor_id = '$taste1_id'";
$search_taste2_query = "SELECT recipe_id FROM style WHERE factor_id = '$taste2_id'";
$search_taste3_query = "SELECT recipe_id FROM style WHERE factor_id = '$taste3_id'";
*/
#***********End Assorted Query Stuff***********#

#***********Start Queries Block***********#

#start array to hold results
$recipe_ids = array();

#based on title search
if(isset($search_title)){$result = mysqli_query($mysqli, $search_title_query);
while(($row = mysqli_fetch_assoc($result))) {
    $recipe_ids[] = $row['recipe_id'];}}
#print_r($recipe_ids);
#echo "<br /><br />";

#based on description search
if(isset($search_description)){
$result = mysqli_query($mysqli, $search_description_query);
while(($row = mysqli_fetch_assoc($result))) {
    #if(!in_array($row['recipe_id'], $recipe_ids)){
        $recipe_ids[] = $row['recipe_id'];
		//echo "b<br>";
}}
#}
#print_r($recipe_ids);
#echo "<br /><br />";

#based on taste 1
if(isset($search_taste1)){
$result = mysqli_query($mysqli, $search_taste1_query);
while(($row = mysqli_fetch_assoc($result))) {
    #if(!in_array($row['recipe_id'], $recipe_ids)){
        $recipe_ids[] = $row['recipe_id'];
		//echo "c<br>";
}}
#}
#print_r($recipe_ids);
#echo "<br /><br />";

#based on taste 2
if(isset($search_taste2)){
$result = mysqli_query($mysqli, $search_taste2_query);
while(($row = mysqli_fetch_assoc($result))) {
    #if(!in_array($row['recipe_id'], $recipe_ids)){
        $recipe_ids[] = $row['recipe_id'];
}}
#}
#print_r($recipe_ids);
#echo "<br /><br />";

#based on taste 3
if(isset($search_taste3)){
$result = mysqli_query($mysqli, $search_taste3_query);
while(($row = mysqli_fetch_assoc($result))) {
    #if(!in_array($row['recipe_id'], $recipe_ids)){
        $recipe_ids[] = $row['recipe_id'];
		//echo "d<br>";
}}
#}
#print_r($recipe_ids);
#echo "<br /><br />";

#foreach($recipe_ids as $rid){
#$search_counts[] = array_count_values_of($rid, $recipe_ids);
#}

#print_r($search_counts);
#echo "<br /><br />";
#
//print_r($recipe_ids);
//echo "<br /><br />";
#***********End Queries Block***********#

#***********Start Process Query Results***********#

#Return results to Cookbook
unset($_REQUEST);
$doc = new DOMDocument();
foreach($recipe_ids as $k => $return_id){
    $id_result_query = "SELECT R.title, Ri.filename, R.source, R.recipe_id FROM Recipe R join Recipe_img Ri on R.recipe_id = Ri.recipe_id WHERE R.recipe_id = '$return_id'";
    $id_result = mysqli_query($mysqli, $id_result_query);
    $id = mysqli_fetch_row($id_result);
	if ($valid_search == 1) 
	{
    $_REQUEST[$k] = "<a class='recipe_link' href='http://www.toquecooks.com/recipe.php?id=$id[3]'><div ><img alt='recipe thumb' src='.$id[1]' width='98' height='98'><h3>$id[0]</h3><p>$id[2]</p></div></a>"; 
} else if ($valid_search == 0){
	$_REQUEST[$k] = "<a class='recipe_link' href='http://www.toquecooks.com/cookbook.php'><div ><img alt='recipe thumb' src='./images/toque_blank_greenBG.jpg' width='98' height='98'><h3>No Data Found Please search again</h3></div></a>"; }
    #echo "$_REQUEST[$k]<br>";        
}
#print_r($_REQUEST);
    $shoot_me_now = implode(" ", $_REQUEST);
    $_SESSION['domdoc'] = $shoot_me_now;
    #echo strlen($_SESSION['domdoc']);
    #print_r($_POST);
#$_POST['domdoc'] = $doc->saveHTML($_REQUEST);
#$node = $doc->getElementById("search_results");
#$node->appendChild($result_string);
#print_r($_SESSION);

header("Location: http://www.toquecooks.com/cookbook.php");



#build an output array while eliminating duplicates
/*
foreach ($search_title_query_result as $stqra)
{
    echo $stqra;
}
*/

#***********End Process Query Results***********#
?>


