<!DOCTYPE html>
<html lang="en">
<head>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<title>RRR - Register/Login</title>
	<link rel="stylesheet" href="css/style.css" media="screen">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<meta name="description" content="Red Robin Records">
	<meta name="keywords" content="Music">
	<meta name="author" content="Alan Flood">
</head>
<body>
	<div id="big_wrapper" class="nightbg">
		<?php include 'banner.php'; ?>
		<nav class="menu nightmenu">
			<?php include 'nav.php'; ?>
		</nav>
		<div class="form-container">
			<div class="formwrap wrap">
				<div class="form">
			    	<ul class="tab-group">
			        	<li class="tab signup active"><a href="#signup">Sign Up</a></li>
						<li class="tab login"><a href="#login">Log In</a></li>
			      	</ul>
			  	<div class="tab-content">
			        <div id="signup">
			          <h1>Sign Up, It's Free!</h1>
					  <form action="registerUser.php" method="post">
						<div class="field-wrap">
				            <label>
								Username<span class="req">* <b class="error"></b></span>
							</label>
							<input type="text" name="Username" required autocomplete="off" maxlength="30"/>
				        </div>
					  	<div class="top-row">
			            	<div class="field-wrap">
								<label>
									First Name<span class="req">* <b class="error"></b></span>
								</label>
								<input type="text" name="UserFirstName" required autocomplete="off" maxlength="30"/>
			            	</div>
			            <div class="field-wrap">
			              	<label>
						  		Last Name<span class="req">*</span>
						  		</label>
						  	<input type="text" name="UserLastName" required autocomplete="off" maxlength="30"/>
			            	</div>
			          	</div>
					  	<div class="field-wrap">
			            	<label>
								Email Address<span class="req">*</span>
							</label>
							<input type="email" name="UserEmail" required autocomplete="off" maxlength="60"/>
			          	</div>
					  	<div class="field-wrap">
			            	<label>
								Set A Password<span class="req">*</span>
							</label>
							<input type="password" name="UserPass1" required autocomplete="off"/>
			          	</div>
			          	<div class="field-wrap">
			            	<label>
								Confirm Password<span class="req">*<b class="error"></b></span>
							</label>
							<input type="password" name="UserPass2" required autocomplete="off"/>
			          	</div>
					  	<button type="submit" class="button button-block">Get Started!</button>
			          	</form>

			   		</div>
			   		<div id="login">
			   			<h1>Welcome!</h1>
				   			<form action="loginUser.php" method="post">
			   				<div class="field-wrap">
			   					<label>
			   						Username<span class="req">*</span>
			   					</label>
			   					<input type="text" name ="Username"required autocomplete="off"/>
		          			</div>
				  			<div class="field-wrap">
				  				<label>
				  					Password<span class="req">*</span>
				  				</label>
				  				<?php echo "$passworderror"; ?>
				  				<input type="password" name="UserPass" required autocomplete="off"/>
		          			</div>
				  		<p class="forgot"><a href="#">Forgot Password?</a></p>
				  		<button class="button button-block">Log In</button>
		          		</form>
		        	</div>
		      	</div><!-- /tab-content -->
			</div> <!-- /form -->
		</div><!-- /formwrap -->
	</div><!-- /form-container-->
	<script src="js/registration.js"></script>
	<footer  class="nightmenu">
		<div>
			<img src="assets/images/FootNight.jpg" alt="">
		</div>
		<div id="menu">
			<p>Alan Flood 2015</p>
		</div>
	</footer>
	</div>
</body>
</html>