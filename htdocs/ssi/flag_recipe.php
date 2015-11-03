<?php
session_start();
	// this code will "flag the approval value for the recipe id so that it will not display
	//require_once('db2.php')	;
	$mysqli = new mysqli("wagnerj.powwebmysql.com", "toque_usr", "Sen!0rPr0j!", "toque_db");
	$id=$_POST['recipe_id'];
	$sql="UPDATE Recipe_approvals SET recipe_approval='1' where recipe_id='$id'";
	//echo "\sql: $sql<br>";
	$result = mysqli_query($mysqli, $sql);
	$_SESSION['msg']="Recipe has been flagged for administrative review. It will no longer appear in searches.<br>";
	header('Location: http://www.toquecooks.com/cookbook.php');
	
?>