					<div id="personal">
						<?php if($_SESSION['fname']) echo "<p>Welcome, " . $_SESSION['fname'] . "!</p>"; ?>
					</div>
					<div>
						<?php include 'ssi/adsense-lb.inc'; ?>
					</div>
					<div>
						<?php
							$url = $_SERVER['REQUEST_URI'];
							$file = "";
							
							if(strpos($url, "?") !== false) {
								$half = substr($url, strrpos($url, "?"));
								$path = str_replace($half, "", $url);
								$file = substr($path, strrpos($path, "/") + 1);
							}
							else {
								$file = substr($url, strrpos($url, "/") + 1);
							}
							
							if($file == "recipe.php") {
								echo '<div id="calc" class="calc">
									<div>
										<h2 id="title">Servings Calculator</h2>
										<span id="vals"></span>
									</div>
									<!--<div id="header_1">
										<div><span>Item name</span></div>
										<div><span>&times; [need] &minus; [have]</span></div>
									</div>
									<div id="header_2">
										<div><span>Other factors</span></div>
									</div>-->
									<div>
										<div><p>Servings:</p></div>
										<div><p><input id="calc_servings" type="text" size="3" maxlength="3" value="' . $field['servings'] .'"></p></div>
									</div>
									<!--<div>
										<div><p>Final cost:</p></div>
										<div><p><input id="final" type="text" size="7" value="$0.00" disabled></p></div>
									</div>-->
									<div>
										<div><div class="buttons" id="recalc">Recalculate</div></div>
										<div><div class="buttons" id="reset">Reset</div></div>
									</div>
								</div>
								';
							} else {
							
								//	get latest recipe images
								$latest = "SELECT Ri.recipe_id, filename, title
									FROM Recipe_img Ri
										JOIN Recipe R ON Ri.recipe_id = R.recipe_id
										JOIN Recipe_approvals Ra ON Ra.recipe_id = R.recipe_id
									WHERE
										Ra.recipe_approval != 1
									ORDER BY recipe_id DESC
									LIMIT 6";
								$latest_imgs = $db->query($latest);
								
								//	get most popular recipe images
								$popular = "SELECT Ri.recipe_id, filename, title
									FROM Recipe_img Ri
										JOIN Recipe R ON Ri.recipe_id = R.recipe_id
										JOIN Recipe_popular Rp ON Rp.recipe_id = R.recipe_id
									ORDER BY pop_count DESC
									LIMIT 6";
								$popular_imgs = $db->query($popular);
								
								echo '<h3>Popular recipes</h3>
									<div id="popular" class="sideScroll">
										<div>';
											foreach($popular_imgs as $row) {
												echo '<a href="recipe.php?id=' . $row['recipe_id'] . '"><img width="70" height="70" src="' . $row['filename'] . '" title="' . $row['title'] . '"></a>';
											}
								echo	'</div>
									</div>
									<h3>Newest recipes</h3>
									<div id="latest" class="sideScroll">
										<div>';
											foreach($latest_imgs as $row) {
												echo '<a href="recipe.php?id=' . $row['recipe_id'] . '"><img width="70" height="70" src="' . $row['filename'] . '" title="' . $row['title'] . '"></a>';
											}
								echo	'</div>
									</div>';
							}
						?>
					</div>