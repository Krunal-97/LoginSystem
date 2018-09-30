<?php
$pwd='';
$pwd_error =$submsg='';

	if(isset($_POST['submit']))
	{
		$conn = mysqli_connect("localhost","root","","loginsystem");

		$pwd = mysqli_real_escape_string($conn,$_POST['newpassword']);

		if(empty($pwd))
		{
			$pwd_error = "Password is Required.";
		}
		
		else
		{
			$uppercase = preg_match('@[A-Z]@', $pwd);
			$lowercase = preg_match('@[a-z]@', $pwd);
			$number    = preg_match('@[0-9]@', $pwd);

			if(!$uppercase || !$lowercase || !$number || strlen($pwd) < 8)
			{
 			 $pwd_error = "Password contain atleast one capital and small letter and the length of the password should be 8 characters.";
			}
			else
			{
				$hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);
				 $sql = "UPDATE users SET pwd='$hashedpwd' WHERE email='pkp.17.11.97@gmail.com';";
                  mysqli_query($conn,$sql);
				$submsg = "Password changed successfully.";
				
			}
		}
	}
?>