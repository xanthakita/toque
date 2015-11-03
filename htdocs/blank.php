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
                                                    echo $emp . "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
                                                }
                                                elseif(empty($emp))
                                                {
                                                    echo "";
                                                }
                                        ?>
					
                </div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </div>
		</div>
		<?php include 'ssi/footer.php'; ?>
	</body>
</html>