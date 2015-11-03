<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toque | Home</title>
		<link rel="stylesheet" type="text/css" href="/css/calc.css">
        <!--[if IE]><link rel='stylesheet' type='text/css' href='/css/base_IE.css'><!--[endif]-->
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/calc.js"></script>
		<script type="text/javascript" src="/js/general.js"></script>
    </head>
    <body>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.php'; ?>
		<?php include 'ssi/float.php'; ?>
	<?php	// increase count of popularity in Recipe_popular
		$theRecipeid=$_GET['id'];
	$sql="insert into Recipe_popular (recipe_id, pop_count) values ('$theRecipeid',1) on duplicate Key Update pop_count=pop_count+1";
	$results = $db->query($sql); ?>
		<div id='main'>
            <div id='body'>
                <div id='recipe' class='recipe'>
					<!--<div id='tags'>
						<div class="tag" style="color:#FFF;background-color:#939;">Sweet</div>
						<div class="tag" style="color:#000;background-color:#9C0;">Low carb</div>
						<div class="tag" style="color:#000;background-color:#6F9;">Snack</div>
					</div>-->
					<div>
					<?php
						$recipe = "SELECT R.recipe_id, title, filename, servings, description, instructions, source
						FROM Recipe R
							JOIN Recipe_img Ri on R.recipe_id = Ri.recipe_id
						WHERE R.recipe_id = " . $_GET['id'];
						$ingredients = "SELECT c.quantity, m.abbrv, I.name, c.prep
						FROM components c
							join Ingredients I on c.ingredient_id = I.ingredient_id
							join Measurements m on c.measure_id = m.id
						where c.recipe_id = " . $_GET['id'];
						$approvals= "SELECT * from Recipe_approvals where recipe_id = '".$_GET['id']."'";
						$rec_results = $db->query($recipe);
						$ingr_results = $db->query($ingredients);
						$approval_results = $db->query($approvals);
						$user_loggedin = "no";
						if (isset($_SESSION['user_name'])) {
								$user_loggedin = "yes";
						}
						foreach($approval_results as $approval) {
							$recipe_approved = $approval['recipe_approval'];
							$image_approved = $approval['image_approval'];
						}
						//echo "$recipe_approved - $image_approved";
						foreach($rec_results as $field) {
							//print_r("here");
							//print_r($field);
							if ($image_approved == '1') {
								echo "<img width='175' height='175' src='" . $field['filename'] . "' title='" . $field['title'] . " thumbnail'>"; 
							} else {
								echo "<img width='175' height='175' src='./images/toque_blank_greenBG.jpg' title='" . $field['title'] . " thumbnail'>";
							}
							echo "<h3>" . $field['title'] . "</h3>
							<p><b>Recipe by</b>: " . $field['source'] . "</p>
							<p><b>Servings</b>: <span id='servings'>" . $field['servings'] . "</span></p>
							<p><b>Description</b>: " . $field['description'] . "</p>
							<table id='ingredients_list'>
								<tr>
									<th colspan='3' align='left'>Ingredients:</th>
								</tr>
							</table>
							<p><b>Instructions</b>: " . $field['instructions'] . "</p>";

							if (( $recipe_approved != '2') && ($user_loggedin != "no")) {
								echo "<br><form action='ssi/flag_recipe.php' method='post' ><input name='recipe_id' type='hidden' value='".$_GET['id']."' />";
								echo "<input type='submit' value='Flag Recipe' /></form>"; }
							
							$json = '{"name":"' . $field['title'] . '","ingredients":[';
							$i = 0;
							foreach($ingr_results as $row) {
								if($i > 0)
									$json .= ',';
								$json .= '{"name":"' . $row['name'] . '","cost":2.1,"quantity":' . $row['quantity'] . ',"abbrv":"' . $row['abbrv'];
								if($row['prep'] != "")
									$json .= '","prep":"' . $row['prep'];
								$json .= '"}';
								$i++;
							}
							$json .= '],"servings":' . $field['servings'] . '}';
							
							$fo = fopen("js/recipe.json","w");
							fwrite($fo, $json);
							fclose($fo);
						}
					?>
					</div>
                </div>
				
                <div id="side" class='side'>
					<?php include 'ssi/side.php'; ?>
                </div>
            </div>
		</div>
		<?php include 'ssi/footer.php'; ?>
	</body>
</html>