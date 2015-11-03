		<div id='header' class="header">
			<div id="header_content">
				<div id='banner'>
					<a href="/"><img width="475" height="100" src="/images/Toque_Banner.png"></a>
				</div>
				<?php  include_once("/home/users/web/b2536/pow.wagnerj/toque/htdocs/ssi/analyticstracking.php"); ?>
				<div id="menu" class='bar'>
					<p><a href="/">Home</a> | <a href="/cookbook.php">Cookbook</a> | <a href="/FAQ.php">FAQ</a></p>
				</div>
				<div id="user" class="bar">
					<?php					
						include 'ssi/database.php';
						if($_COOKIE['userid'])
							echo "<p><!--<a>Account</a> | <a>My Recipes</a> | --><a href='ssi/logout.php'>Logout</a></p>";
						else
							echo "<p><span id='login'>Login/Sign up</span></p>";
					?>
				</div>
			</div>
		</div>
		
		
		<!-- full path:  /home/users/web/b2536/pow.wagnerj/toque/htdocs  -->