<?php
session_start();
    $_SESSION['msg'] = "";
    if(!$_COOKIE['userid'])
    {
        $_SESSION['msg'] = "Please log in to submit a recipe.";
        header("Location: http://www.toquecooks.com");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Toque | Home</title>
        <link rel='stylesheet' type='text/css' href='/css/base.css'>
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/general.js"></script>
    </head>
    <body>
        <?php echo $error_message; ?>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.php'; ?>
		<?php include 'ssi/float.php'; ?>
        
        
        <!-- get data for select drop-downs -->
        <?php
            #set tastes query
            require_once 'ssi/database.php';
            $tastes_query = 'SELECT * FROM tastes ORDER BY factor';
            $tastes = $db->query($tastes_query);
            
            #get measurements, dump into array
            require_once 'ssi/database.php';
            $measures_query = 'SELECT long_name FROM Measurements ORDER BY long_name';
            $measures = $db->query($measures_query);
            $m_array = array();
            foreach($measures as $m){
                $m_array[] = $m['long_name'];
            }
            
            #get ingredients, dump into array
            require_once 'ssi/database.php';
            $ingredients_query = 'SELECT name FROM Ingredients WHERE name NOT LIKE "<br>%" ORDER BY name';
            $ingredients = $db->query($ingredients_query);
            $i_array = array();
            foreach($ingredients as $ing){
                $i_array[] = $ing['name'];
            }
            
        ?>
        
        
		<div id='main'>
            <div id='body'>
                <div id='recipe' class='recipe'>
					
					<div>
                                            <h3>Add a new recipe</h3>
                                            
                                            <!-- UPDATE FORM ACTION -->
                                            <form action="/ssi/new_recipe.php" method="post" id="add_recipe_form">
                                                  
                                                <label>Title:</label>&nbsp;
                                                <input type="input" name="title" />
                                                <br />
                                                 <!-- pass user name in a hidden element to POST array for pickup by form processing. -->
                                                <input type="hidden" name="user_name" value="<?php echo $_COOKIE['userid']; ?>" />
                                                <br />
                                                
                                                <!-- date entered -->
                                                <input type="hidden" name="date_entered" value="<?php $now_date = date('Y-m-d', strtotime("today")); ?>" />
                                                       <!-- test the date <?php echo $now_date ?> -->
                                                <br />
                                                
                                                <label>Ingredients:</label><br />
                                                <table border="" width="75%">
                                                    <tr>
                                                        <th width="25%">Quantity</th>
                                                        <th width="25%">Measure</th>
                                                        <th width="25%">Ingredient</th>
                                                        <th width="25%">Prep Inst.</th>
                                                    </tr>
                                                    
                                                    <?php
                                                    $c = 1;
                                                    while($c <= 10) : ?>
                                                    <tr>
                                                        <td><input type="text" name="ing1" /></td>
                                                        <td><select>
                                                            <?php foreach($m_array as $k => $v) : ?>
                                                                <option value="<?php echo $v; ?>">
                                                                    <?php echo $v; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select></td>
                                                        <td><select>
                                                            <?php foreach($i_array as $k => $v) : ?>
                                                                <option value="<?php echo $v; ?>">
                                                                    <?php echo $v; ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                        </select></td>
                                                        <td>
                                                            <input type="text" name="prep" />
                                                        </td>
                                                    </tr>
                                                    <?php $c++; endwhile; ?>
                                                </table>
                                                
                                                <br />
                                                
                                                <p><a href="/new_ingredient_form.php">Submit a new ingredient</a></p>
                                                
                                                <label>Instructions:</label> <br />
                                                <textarea name="instructions" rows="6" cols="100" placeholder="Enter the direction for preparing your recipe. Remember to tell your cook what to do with each ingredient and in what order!"></textarea>
                                                <br />
                                                
                                                <label>Serves/Yields:</label>
                                                <input type="text" name="serves" />
                                                <br />
                                                
                                                <label>Description:</label> <br />
                                                <textarea name="description" rows="6" cols="100" placeholder="Briefly describe your recipe."></textarea>
                                                <br />
                                                
                                                <label>Taste:</label>                                              
                                                <select name="taste1">
                                                    <?php $db->query($tastes_query); ?>
                                                    <?php foreach ($tastes as $taste) : ?>
                                                    <option value="<?php echo $taste['factor']; ?>">
                                                    <?php echo $taste['factor']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;
                                                <select name="taste2">
                                                    <?php $tastes = $db->query($tastes_query); ?>
                                                    <?php foreach ($tastes as $taste) : ?>
                                                    <option value="<?php echo $taste['factor']; ?>">
                                                    <?php echo $taste['factor']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;
                                                <select name="taste3">
                                                    <? $tastes = $db->query($tastes_query); ?>
                                                    <?php foreach ($tastes as $taste) : ?>
                                                    <option value="<?php echo $taste['factor']; ?>">
                                                    <?php echo $taste['factor']; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <br />
                                                <br />
                                                <input type="submit" value="Submit" />
                                            </form>
					</div>
                </div>
				
                <div id="side" class='side'>
		<?php include 'ssi/side.php'; ?>
                </div>
            </div>
		</div>
		<?php include 'ssi/footer.php'; ?>
                
                <?php #close connection to toque db ?>
                
	</body>
</html>