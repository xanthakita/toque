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
       	<?php include 'ssi/header.php'; ?>
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
                                            <h3>Request a Password Reset</h3>
                                            <br />
                                            <br />
                                            <p>
                                                Please enter the email address with which you signed up for Toque. <br /><br />
                                                Click "Submit" and check your email for a link to reset your password.<br />
                                                If you don't receive the email in a few minutes, make sure to check your Spam folder.
                                            </p>
                                            <br />
                                            <br />
                                            <form action="ssi/password_reset_email.php" method="post" id="password_email_form">
                                                <label>Email:</label>
                                                <input type="text" name="user_email" />
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