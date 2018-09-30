
<?php/*
include_once 'phpmailer/PHPMailerAutoload.php';


$mail = new PHPMailer();
$mail->Host = "smtp.gmail.com";
//$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Username = 'pkp.17.11.97@gmail.com';
$mail->Password = '123456789';

$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Subject = 'SMTP email test';
$mail->Body = 'this is some body';



$mail->setFrom('pkp.17.11.97@gmail.com', 'KPK');
$mail->addAddress('krunalparmar418@gmail.com');



if ($mail->send())
    echo "Mail sent";
else
	echo $mail->ErrorInfo;*/
?>
<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true); 
$conn = mysqli_connect("localhost","root","","loginsystem");                            

                    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'web.kp.123@gmail.com';                 // SMTP username
                    $mail->Password = 'krunal123..';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('web.kp.123@gmail.com', 'KP-WEB');
                    $mail->addAddress($_SESSION['email']);
                    $email =  $_SESSION['email'];   // Add a recipient

                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Reset your Password';
                    $_SESSION['code'] = rand(9999,10000000);
                    $code =  $_SESSION['code'];
                    $mail->Body    = "Your OTP is :<br><br> $code";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    
                    $sql = "UPDATE users SET otp='$code' WHERE email='$email';";
                    mysqli_query($conn,$sql);

                    $mail->send();
                    header('Location: enterotp.php');
                  //  }
                //} catch (Exception $e) {
                    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                //`		}
?>