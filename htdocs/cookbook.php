<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toque | Home</title>
		<link rel="stylesheet" type="text/css" href="/css/cookbook.css">
        <!--[if IE]><link rel='stylesheet' type='text/css' href='/css/base_IE.css'><!--[endif]-->
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/general.js"></script>
	
    </head>
    <body>
        <?php
            #set tastes query
            require_once 'ssi/database.php';
            $tastes_query = 'SELECT * FROM tastes ORDER BY factor';
            $tastes = $db->query($tastes_query);
            $t_array = array();
            foreach($tastes as $t){
                $t_array[] = $t['factor'];
            }
        ?>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.php'; ?>
		<?php include 'ssi/float.php'; ?>
		<div id='main'>
            <div id='body'>
                
                <div id='cookbook' class='cookbook'>
                    <!-- search area -->
                    <div class="search_recipe_form">
                        <form action="/ssi/search_recipes.php" method="post" id="search_recipe_form" >
                        Search for recipes in: <br /><br />
                        
                        <?php if($_SESSION['msg']){
                    echo $_SESSION['msg'];
                }
                ?>
                        
                        <table width="80%">
                            <tr>
                                <td>
                        <label>Title:</label>
                                </td>
                                <td>
                        <input type="input" name="title" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                        <label>Description:</label>
                                </td>
                                <td>
                            <input type="input" name="description" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                        <label>Taste:</label>
                                </td>
                                <td>
                            <select name="taste1">
                                <?php foreach ($t_array as $k => $v) : ?>
                                <option value="<?php echo $v; ?>">
                                    <?php echo $v; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                            <select name="taste2">
                                <?php foreach ($t_array as $k => $v) : ?>
                                <option value="<?php echo $v; ?>">
                                    <?php echo $v; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                            <select name="taste3">
                                <?php foreach ($t_array as $k => $v) : ?>
                                    <option value="<?php echo $v; ?>">
                                    <?php echo $v; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                     <input type="submit" value="Search" /> </form>
									 <form action="/ssi/search_recipes.php" method="post" id="search_recipe_form" ><input name="title" type="hidden" value="%" /><input type="submit" value="Browse all recipes" /></form> 
                                </td>
                            </tr>
                        </table>               
                        <!-- </form> -->
                        <br />
                        <p><a href="new_recipe_form.php">Submit a new recipe</a></p>
                    </div>
                        <div id="search_results">
						<?php
						if($_POST['getAll'] == "true") {
						require_once 'ssi/database.php';
						$allQuery = "SELECT Ri.recipe_id, filename, title, source
							FROM Recipe_img Ri
								JOIN Recipe R ON Ri.recipe_id = R.recipe_id";
						$allResults = $db->query($allQuery);
						foreach($row as $allResults) {
							echo "<a class='recipe_link' href='recipe.php?id=" . $row['recipe_id'] . "'>
								<div>
									<img width='98' height='98' alt='recipe thumb' src='" . $row['filename'] . "'>
									<h3>" . $row['title'] . "</h3>
									<p>" . $row['source'] . "</p>
								</div>
							</a>";
						}
						}
						else
						echo $_SESSION['domdoc'];
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