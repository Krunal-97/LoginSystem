<?php
$fname_error = $lname_error = $email_error = $uname_error = $pwd_error = $submsg= "";
$fname = $lname = $email = $uname = $pwd = "";

	if(isset($_POST['submit']))
	{
		$conn = mysqli_connect("localhost","root","","loginsystem");


		$fname = mysqli_real_escape_string($conn,$_POST['fname']);
		$lname = mysqli_real_escape_string($conn,$_POST['lname']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$uname = mysqli_real_escape_string($conn,$_POST['uname']);
		$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

		
		$post_data = http_build_query(
		    array(
		        'secret' => '6LdRgWcUAAAAAMVf4gIFYAqna190CehOxQ9dOhKr',
		        'response' => $_POST['g-recaptcha-response'],
		        'remoteip' => $_SERVER['REMOTE_ADDR']
		    )
		);
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $post_data
		    )
		);
		$context  = stream_context_create($opts);
		$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
		$result = json_decode($response);
		if (!$result->success) 
		{
			echo
			"<script>
		    alert('Please verify recaptcha');
		    </script>";
		}
		else
		{
			if(empty($fname))
				{
					$fname_error = "First Name is Required.";
				
				}
				elseif(!preg_match('/^[a-zA-Z]*$/', $fname))
				{
					$fname_error = "Only letters are allowed.";
				}
				else
				{
					
				}

				if(empty($lname))
				{
					$lname_error = "Last Name is Required.";
				}
				elseif(!preg_match('/^[a-zA-Z]*$/', $lname))
				{
					
						$lname_error = "Only letters are allowed.";
				}

				if(empty($email))
				{
					$email_error = "E-mail is Required.";
				}
				elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
					$email_error = "E-mail is invalid.";
				}
				else
				{
					$sql = "SELECT * FROM users WHERE email = '$email';";
					$result = mysqli_query($conn,$sql);
					$resultcheck = mysqli_num_rows($result);
					if($resultcheck > 0)
						{
							$email_error = "E-mail is already had been used.";	
						}

				}

				if(empty($uname))
				{
					$uname_error = "User Name is Required.";
				}
				else
				{
					$sql = "SELECT * FROM users WHERE uname = '$uname';";
					$result = mysqli_query($conn,$sql);
					$resultcheck = mysqli_num_rows($result);
			
					if($resultcheck > 0)
					{
						$uname_error = "User Name is already had been used.";	
					}	
				}

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
						$sql = "INSERT INTO users(fname,lname,email,uname,pwd) VALUES ('$fname','$lname','$email','$uname','$hashedpwd');";
						mysqli_query($conn,$sql);
						$submsg = "Form is successfully submitted.";
						
					}
				}
}

		

	}
	
?>