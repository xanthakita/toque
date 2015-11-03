<!DOCTYPE html>
<?php

?>
<html>
    <head>
        <title>Toque | Home</title>
        <link rel='stylesheet' type='text/css' href='/css/base.css'>
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/general.js"></script>
    </head>
    <body>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.htm'; ?>
		<?php include 'ssi/float.php'; ?>
        <?php $now_date = date('Y-m-d', strtotime("today")); ?>
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
                                            <h3>Set up your user account</h3>
                                            
                                            <!-- UPDATE FORM ACTION -->
                                            <form action="ssi/new_user.php" method="post" id="user_signup_form">
                                                
                                                <?php
                                                #get error message, if exists
                                                $em = $_GET['errmsg'];
                                                if (!empty($em))
                                                {
                                                    echo $em . "<br /><br />";
                                                }
                                                ?>
                                                <label>Email:</label>&nbsp;
                                                <input type="email"  name="user_email" required placeholder="Enter a valid email">
                                                <br />
                                                <br />
                                                <label>Username:</label>&nbsp;
                                                <input type="text" name="user_username"  required >
                                                <br />
                                                <br />
                                                <label>Password:</label>&nbsp;
                                                <input type="password" name="user_password"  required >
                                                <br />
                                                <br />
                                                <label>Birthday:</label>&nbsp;
                                                <select name="user_birth_month">
                                                    <?php
                                                    #define 1-based array of months with month number as index
                                                    $months = array(1 => 'January', 'February', 'March', 'April', 
                                                        'May', 'June', 'July', 'August', 'September',
                                                        'October', 'November', 'December');
                                                    foreach ($months as $month) : ?>
                                                        <option value="<?php echo "$month"; ?>" >
                                                            <?php echo "$month"; ?>                                                        
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <select name="user_birth_date">
                                                    <?php
                                                    #define array of days in the month
                                                    for ($d = 1; $d <= 31; ++$d)
                                                    {
                                                        $days[] = $d;
                                                    }
                                                    #Remember to check on the back-end for invalid dates like Feb 30.
                                                    foreach ($days as $day) : ?>
                                                        <option value="<?php echo $day; ?>" >
                                                            <?php echo $day; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            
                                                <input type="hidden" name="user_signup_date"
                                                       value="<?php echo $now_date; ?>" />
                                                
                                                <br />
                                                <br />
                                                <input type="submit" value="Submit" />
                                            </form>
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                        </div>
                </div>
				
                <!--<div id="side" class='side'>
		<?php include 'ssi/sideInclude.php'; ?>
                </div>-->
            </div>
		</div>
		<?php include 'ssi/footer.php'; ?>
                
                <?php #close connection to toque db ?>
                
	</body>
</html>