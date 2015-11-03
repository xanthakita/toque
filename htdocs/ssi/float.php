
	<div id="trans"></div>
	<div id="slider" class="slider">
		<div id="x" class="floatBtn">&times;</div>
		
<!-- LOGIN FORM -->
		<div id="loginDiv" class="loginDiv">
			<form action="/ssi/login.php" method="post">
				<div>
					<p>Username: <input type="text" name="login_name" size="9"></p>
					<a>Forgot username</a><br><br>
					<p>Password: <input type="password" name="login_password" size="9"></p>
					<a href="/request_password_reset_form.php">Forgot password</a>
				</div>
				<div>
					<span id="register" class="floatBtn">Register</span>
					<br>
					<input type="submit" value="Login" class="floatBtn">
				</div>
			</form>
		</div>
		
<!-- NEW USER FORM -->
		<div id="newUser" class="newUser">
			<h3>Set up your user account</h3>
                                            
                                            <!-- UPDATE FORM ACTION -->
			<form action="/ssi/new_user.php" method="post" id="user_signup_form">
				<?php
					#get error message, if exists
						$em = $_GET['errmsg'];
					if (!empty($em))
					{
						echo $em . "<br /><br />";
					}
				?>
				<div>
					<p><label>Username: </label></p>
					<p><label>Password: </label></p>
					<p><label>Email: </label></p>
					<p><label>Birthday: </label></p>
				</div>
				<div>
					<p><input type="text" name="user_username"></p>
					<p><input type="password" name="user_password"></p>
					<p><input type="text" name="user_email"></p>
					<p><select name="user_birth_month">
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
					</select></p>
					
					<!--    <select name="user_birth_year">
					<?php 
						#define array of years to select (1900-present), working backward
						#define present year
						$this_year = date('Y', strtotime("today"));
						for ($y = $this_year; $y >= 1900; --$y)
						{
							$years[] = $y;
						}
						foreach ($years as $year) : ?>
						<option value="<?php echo $year; ?>" >
							<?php echo $year; ?>
						</option>
						<?php endforeach; ?>
					</select> -->
					<input type="hidden" name="user_signup_date" value="<?php echo $now_date; ?>">
					<input type="submit" value="Submit" class="floatBtn">
				</div>
			</form>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
	</div>