<?php
session_start();

	if(isset($_POST['submit']))
	{
		$conn = mysqli_connect("localhost","root","","loginsystem"); 

		$otp = $_POST['otp'];
		$email = $_SESSION['email'];

		$sql = "SELECT otp FROM users WHERE email = '$email';";
		$result = mysqli_query($conn,$sql);
		$resultcheck = mysqli_num_rows($result);

		if($resultcheck > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$myotp=$row['otp'];
			}
		}

		if($myotp==$otp)
		{
			header('Location: newpwd.php');
			exit();
		}
		else
		{
			echo "false";
		}
	
	}
?>