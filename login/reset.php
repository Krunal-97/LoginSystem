<?php include '../includes/setotp.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
	<link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
	<script src="js/myscript.js" type="text/javascript"></script>
</head>
<body>
	<section>
		<div class="submitbody2">
			<nav>
				<p class="nav1">
					<a href="../index.php"><img  class="img" src="../imges/signup.png"></a>
				</p>
				<p  class="nav2">
					<a href="login.php"><img  class="img" src="../imges/login.png"></a>
				</p>
			</nav>
			
					</br></br></br>
					<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
						<h3>Reset your Password</h3>
						<p>Click here to reset your password</p>
	
						</br></br>
						<button type="submit" name="submit">Send OTP</button></br>
	

						</br></br>
					</form>
		</div>
	</section>
</body>
</html>

