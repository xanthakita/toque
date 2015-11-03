<!DOCTYPE html>
<?php

?>
<html>
    <head>
        <title>Toque | Home</title>
        <link rel='stylesheet' type='text/css' href='/css/base.css'>
    </head>
    <body>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.htm'; ?>
        <!--?php include 'ssi/database.php'; ?>-->
        
                
        
		<div id='main'>
            <div id='body'>
                <div id='user_signup' class='recipe'>
					
					<!--<div id="side-column">
						<ul>
							<li><a href="#">Sample Link One</a></li>
							<li><a href="#">Sample Link Two</a></li>
							<li><a href="#">Sample Link Three</a></li>
							<li><a href="#">Sample Link Four</a></li>
						</ul>
					</div>-->
					<div>
                                            <h3>Reset your password</h3>
                                            <br />
                                            <br />
                                            <p>
                                                Please enter  username and new password. <br /><br />
                                                Click "Submit" and your password will be reset.<br />
                                            </p>
                                            <br />
                                            <br />
                                            <form action="ssi/password_reset.php" method="post" id="password_email_form">
                                                <label>Username:</label>
                                                <input type="text" name="username" />
                                                <label>Password:</label>
                                                <input type="password" name="password" />
                                                <br />
                                                <br />
                                                <input type="submit" value="Submit" />
                                                <br />
                                                <br />
                                            </form>
                                            
                                            
                                        </div>
                </div>
				
                <!--<div id="side" class='side'>
		<?php include 'ssi/sideInclude.php'; ?>
                </div>-->
            </div>
		</div>
		<?php include 'ssi/footer.php'; ?>
                
	</body>
</html>
