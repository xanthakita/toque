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
					
					<div>
						<h3>Contact Us!</h3>
						
						
                                                <p>Got questions, concerns, comments or complaints? Don't hesitate to 
                                                let us know. We're always happy to hear from our users.
                                                </p>
						<p>Just drop us a line st <a href="mailto:support@toquecooks.com">support@toquecooks.com</a> and one of our
                                                    mostly-harmless admins will get back to you as soon as possible.
                                                    It's that easy! We've dispensed with traditional forms and
                                                    check boxes in favor of letting our users speak their minds.
                                                    We hope you'll appreciate this and take advantage of it.
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