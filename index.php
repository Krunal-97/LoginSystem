<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="js/myscript.js" type="text/javascript"></script>
</head>
<body>
	<section>
		<div>
			<?php
				if(isset($_SESSION['uid']))
				{
					echo
					 "<form action='includes/logout.php' method='POST'>
					<button name='submit' type='submit'>LOG OUT</button>
					</form>";
					echo "you are logged in";
				}
				else
				{
					 include_once 'includes/main.php';
				}
?>
		</div>
	</section>
</body>
</html>