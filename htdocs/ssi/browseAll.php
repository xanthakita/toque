<?php
if($_POST['getData'] == "yes") {
	/*$select = "SELECT Ri.recipe_id, filename, title, source
		FROM Recipe_img Ri
			JOIN Recipe R ON Ri.recipe_id = R.recipe_id"; */
			$select = "SELECT R.title, Ri.filename, R.source, R.recipe_id FROM Recipe R join Recipe_img Ri on R.recipe_id = Ri.recipe_id";
//	echo $select;
	require_once 'database.php';
	$result = $db->query($select);
	$recipes = "";
	foreach($result as $row) {
		$recipes .= "<a class='recipe_link' href='http://www.toquecooks.com/recipe.php?id='" . $row['recipe_id'] . "'>
			<div>
				<img alt='" . $row['title'] . " thumbnail' title='" . $row['title'] . " thumbnail' src='" . $row['filename'] . "' width='98' height='98'>
				<h3>" . $row['title'] . "</h3>
				<p>" . $row['source'] . "</p>
			</div>
		</a>
		";
	}
	echo $recipes;
}
else
	echo "<a class='recipe_link'>
		<div>
			<img alt='empty thumbnail' title='empty thumbnail' src='' width='98' height='98'>
			<h3>Incorrect data sent</h3>
			<p>Toque</p>
		</div>
	</a>";
?>