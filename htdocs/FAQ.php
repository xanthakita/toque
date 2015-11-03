<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toque | Frequently Asked Questions</title>
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
						<h3>ToqueCooks.com FAQ</h3>
						
						<p><strong>Do I have to register to use the site? </strong></p>
						<p>The short answer is no, you do not have to register to use Toquecooks.com; however, there are some benefits, both current and future, 
                                                    if you do.</p>
						<br>
                                                <p><strong>How do I register for the site?</strong></p>
                                                <p>Near the top of the page there is a gold menu bar. At the right of this menu bar is a link that reads "Login/Sign Up."
                                                Clicking this link will show you the login panel. Click "Register" on the login panel, fill out the very short form that it becomes, and you 
                                                will be a bona fide registered Toque user! Remember to keep your password in a safe place and to make it something that would be difficult for
                                                others to guess.</p>
                                                <br>
						<p><strong>Can I bookmark a recipe? </strong></p>
						<p>At present, you will have to use your browsers bookmark feature to do this. Thanks to how Toque handles recipes, this is entirely possible.
                                                As Toquecooks.com matures we will be adding features such as forums, user profiles, and private cookbooks.</p>
						<br>
						<p><strong>How do I find a specific recipe?</strong></p>
						<p>From the main page of toquecooks.com, click on the cookbook link! This displays a search form where you can enter a variety of search criteria.</p>
						<br>
						<p><strong>Can I complain about a recipe on your site?</strong></p>
						<p>Not directly. However, recipes' photos must be approved by an admin before they will display to prevent the distribution of inappropriate content.
                                                You can also "flag" a recipe as inappropriate as detailed in our next point.</p>
						<br>
                                                <p><strong>What if a recipe on your site has legitimately inappropriate or offensive content?</strong></p>
                                                <p>When a new Toque recipe is submitted by a user, the recipe's page will contain a "Flag this recipe" button at the bottom. If you believe that the
                                                content of the recipe is offensive or inappropriate, you may cast your vote by clicking this button. Once clicked, the recipe will become invisible and 
                                                Toque admins will be notified that the recipe needs review and will follow up as quickly as possible. If the admins decide that the content is not 
                                                offensive to most people, they will repost the recipe and remove users' ability to flag it as inappropriate.</p>
                                                <br>
						<p><strong>You asked for my email address. Why?</strong></p>
						<p>There are two reasons we asked for your email address: 1.  We need to be able to contact you if you request a password change, and 
                                                2. We may need to be able to notify you of future updates and changes to the site.  
                                                We will NOT sell your contact information under any circumstances.</p>
                                                <br>
                                                <p><strong>What are <em>Tastes</em>?</strong></p>
                                                <p>Tastes are Toque's way of helping you find recipes based on a broad concept that helps generally define the meal.
                                                Tastes include keywords like "Beef" or "Low-carb" and are intended to give you a way to search beyond title and description searches.
                                                Tastes can also point to dietary properties of a recipe, such as those for vegetarians or folks with common allergies like gluten.
                                                Users can define Tastes when they submit a recipe to assist in this process. At present, it is not possible to add Tastes to an existing
                                                recipe, but that may change in the future. Also, additional Tastes may be added if demand is sufficient for additional keywords.</p>
                                                <br>
										
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