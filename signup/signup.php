<?php include '../includes/submitform.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="js/myscript.js" type="text/javascript"></script>
</head>
<body>
	<section class="container">
		<div class="heading">
			<nav>
				<a href="signup.php">SIGN UP</a>
				<a href="../login/login.php">LOG IN</a>
				<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
				<input type="text" name="fname" placeholder="First Name" autofocus><br>
				<span><?php echo $fname_error; ?></span>
				<input type="text" name="lname" placeholder="Last Name"><br>
				<span><?php echo $lname_error; ?></span>
				<input type="text" name="email" placeholder="Email"><br>
				<span><?php echo $email_error; ?></span>
				<input type="text" name="uname" placeholder="User Name"><br>
				<span><?php echo $uname_error; ?></span>
				<input type="password" name="pwd" placeholder="Password"><br>
				<span><?php echo $pwd_error; ?></span>
				<button type="submit" name="submit">Sign Up</button>
				<span><?php echo $submsg; ?></span>
			</form>
			</nav>
		</div>
	</section>
</body>
</html>
