<?php include 'includes/submitform.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
</head>
<body>
	<section>
		
		<div class="submitbody">
			<nav>
				<p class="nav1">
					<a href="index.php"><img  class="img" src="imges/signup.png"></a>
				</p>
				<p  class="nav2">
					<a href="login/login.php"><img  class="img" src="imges/login.png"></a>
				</p>
			</nav>

	
				</br></br></br>
				<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
					<h1 class="header">Sign Up</h1>
					<input type="text" name="fname" placeholder="First Name" autofocus><br>
					<span><?php echo $fname_error; ?></span></br>
					<input type="text" name="lname" placeholder="Last Name"><br>
					<span><?php echo $lname_error; ?></span></br>
					<input type="text" name="email" placeholder="Email"><br>
					<span><?php echo $email_error; ?></span></br>
					<input type="text" name="uname" placeholder="User Name"><br>
					<span><?php echo $uname_error; ?></span></br>
					<input type="password" name="pwd" placeholder="Password"><br>
					<span><?php echo $pwd_error; ?></span>
					<div class="g-recaptcha" data-sitekey="6LdRgWcUAAAAAIMKn-b1X4IK_PBs8KJxmuKuRNdU"></div></br>
					<button type="submit" name="submit">Sign Up</button></br>
					<span><?php echo $submsg; ?></span><br>
					<span><p>Already have an account? <a href="login/login.php">Log In</a></p></span>
				</form>
			
		</div>
	</section>
</body>
</html>	