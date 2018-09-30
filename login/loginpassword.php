<?php 
include '../includes/checkloginpassword.php';
$email = $_SESSION['email'];
?>
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
				<div class="nav1">
					<a href="../index.php"><img  class="img" src="../imges/signup.png"></a>
				</div>
				<div  class="nav2">
					<a href="login.php"><img  class="img" src="../imges/login.png"></a>
				</div>
			</nav>
					</br></br></br>
					<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
						</br><?php  echo "<p class='headeruser'>Welcome, $email"; ?></br></br>
						<input type="password" name="password" placeholder="Password" autofocus>
						<span><?php echo $pwd_error; ?></span>
						</br></br>
						<button type="submit" name="submit">Log In</button></br>
						<span><a href="reset.php"><p>Forgot Password?</p></a></span>
						<br><br>
					</form>
			
		</div>
	</section>
</body>
</html>

