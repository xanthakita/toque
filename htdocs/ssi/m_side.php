					<div>
						<h4>quick search box</h4>
						<h4><a href="#">advanced search link</a></h4>
					</div>
					<div><h4>ad box</h4></div>
					<div>
						<?php
							$url = $_SERVER['REQUEST_URI'];
							$file = substr($url, strrpos($url, "/") + 1);
							
							if($file == "recipe.php") {
								echo '<h2 id="title">Cost Calculator</h2>
								<span id="vals">1.00;2.30;3.14;</span>
								<div id="calc" class="calc">
									<div>
										<div><span>Item name (price per)</span></div>
										<div><span>&times; [need] &minus; [have]</span></div>
									</div>
									<div id="item1">
										<div><p>Item 1 ($1.00)</p></div>
										<div><p><input type="text" size="3" maxlength="3" value="7" disabled> &minus; <input type="text" size="3" maxlength="3" value="0"></p></div>
									</div>
									<div id="item2">
										<div><p>Item 2 ($2.30)</p></div>
										<div><p><input type="text" size="3" maxlength="3" value="3" disabled> &minus; <input type="text" size="3" maxlength="3" value="0"></p></div>
									</div>
									<div id="item3">
										<div><p>Item 3 ($3.14)</p></div>
										<div><p><input type="text" size="3" maxlength="3" value="4" disabled> &minus; <input type="text" size="3" maxlength="3" value="0"></p></div>
									</div>
									<div>
										<div><span>Other factors</span></div>
									</div>
									<div>
										<div><p>Batches:</p></div>
										<div><p><input id="batches" type="text" size="3" maxlength="3" value="1"></p></div>
									</div>
									<div>
										<div><p>Final cost:</p></div>
										<div><p><input id="final" type="text" size="7" value="$0.00" disabled></p></div>
									</div>
									<div>
										<div><div class="buttons" id="recalc">Recalculate</div></div>
										<div><div class="buttons" id="reset">Reset</div></div>
									</div>
								</div>
								';
							} else {
								echo '<h3>Popular recipes</h3>
									<div id="popular" class="sideScroll">
										<div>
											<img width="70" height="70" title="blank recipe 7" alt="blank recipe 7">
											<img width="70" height="70" title="blank recipe 8" alt="blank recipe 8">
											<img width="70" height="70" title="blank recipe 9" alt="blank recipe 9">
											<img width="70" height="70" title="blank recipe 10" alt="blank recipe 10">
											<img width="70" height="70" title="blank recipe 11" alt="blank recipe 11">
											<img width="70" height="70" title="blank recipe 12" alt="blank recipe 12">
										</div>
									</div>
									<h3>Newest recipes</h3>
									<div id="latest" class="sideScroll">
										<div>
											<img width="70" height="70" title="blank recipe 1" alt="blank recipe 1">
											<img width="70" height="70" title="blank recipe 2" alt="blank recipe 2">
											<img width="70" height="70" title="blank recipe 3" alt="blank recipe 3">
											<img width="70" height="70" title="blank recipe 4" alt="blank recipe 4">
											<img width="70" height="70" title="blank recipe 5" alt="blank recipe 5">
											<img width="70" height="70" title="blank recipe 6" alt="blank recipe 6">
										</div>
									</div>';
							}
						?>
					</div>