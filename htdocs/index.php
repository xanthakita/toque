<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toque | Home</title>
		<link rel="stylesheet" type="text/css" href="/css/base.css">
        <!--[if IE]><link rel='stylesheet' type='text/css' href='/css/base_IE.css'><!--[endif]-->
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/general.js"></script>
		<?php include 'ssi/meta.html'; ?>
    </head>
    <body>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.php'; ?>
		<?php include 'ssi/float.php'; ?>
		<div id='main'>
            <div id='body'>
                <div id='recipe' class='recipe'>
                                        <?php #echo $message; ?>
                                        <?php
                                        #get error message, if exists
                                                $emp = '';
                                                $emp = $_SESSION['msg'];
                                                
                                                if (!empty($emp))
                                                {
                                                    echo $emp . "<br />";
                                                }
                                                elseif(empty($emp))
                                                {
                                                    echo "";
                                                }
                                        ?>
					
					<div>
						<h3>Welcome to Toque!</h3>
						
						
						<p>toquecooks.com is the one-stop shop for any fan of food!</p>
						<p>Whether you're a vegan or carnivore, budding home cook or seasoned epicurean,
                                                    Toque is here to help you catalog and share your favorite recipes.
                                                    Check the Cookbook page to see new and hot recipes submitted by other users
                                                    at any time. Toque users have got it going on from pot pies to steak fries and
                                                    everything in between. Diabetic? Toque has diabetic recipes.
                                                    Interested in going gluten-free? That's here, too.
                                                </p>
                                                <p>Not sure if you've got the ingredients you need to make a tasty recipe hosted here?
                                                    No problem! Simply use our handy calculator on a recipe's page to ensure you
                                                    have everything on hand to get the job done.</p>
						<p>Not a Toque user yet? No problem. Just click "Login/Sign Up" on the menu bar
                                                    above to get started. All you need is an email address; pick a username and
                                                    password, and you'll be ready to start sharing your recipes like a pro.
                                                    You can always view Toque recipes, but if you want to get in on the action,
                                                    you'll have to register.
                                                </p>
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