<?php 
session_start();
$email_error="";
$email="";
	if(isset($_POST['submit']))
	{
		
		$conn = mysqli_connect("localhost","root","","loginsystem");

		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$_SESSION['email'] = $email;

		if(empty($email))
		{
			$email_error = "Please enter your E-mail.";
		}
		else
		{
			$sql = "SELECT * FROM users WHERE email = '$email' || uname = '$email';";
			$result = mysqli_query($conn,$sql);
			$resultcheck = mysqli_num_rows($result);
	
			if($resultcheck < 1)
			{
				$email_error = "Please enter valid E-mail.";
			}
			else
			{
				header('Location: ../login/loginpassword.php');
				exit();
			}
		}
	}
?>