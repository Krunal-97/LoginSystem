<?php 
session_start();
$pwd_error = "";

	if(isset($_POST['submit']))
	{
		$conn = mysqli_connect("localhost","root","","loginsystem");

		$email = $_SESSION['email'];
		$pwd = mysqli_real_escape_string($conn,$_POST['password']);

		if(empty($pwd))
		{
			$pwd_error = "Please enter your password";
		}
		else
		{
			$sql = "SELECT * FROM users WHERE  email = '$email' || uname = '$email';";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			$hash = $row['pwd'];
			
			if(!password_verify($pwd,$hash))
			{
				$pwd_error = "Please enter correct Password";
			}
			else
			{
				$_SESSION['uid'] = $row['uid'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['uname'] = $row['uname'];
				header('Location: ../index.php');
				exit();
			}
		}
	}
?>