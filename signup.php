<?php
session_start();
include("dbcon.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";


function sendMailer($name,$email,$verify_token){
      $mail = new PHPMailer(true);
      try{
            
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
            $mail->isSMTP(); 
            $mail ->Host = "smtp.gmail.com";
            $mail->SMTPAuth   = true; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail ->Port = 465;
            $mail ->Username="fitouribz11@gmail.com";
            $mail ->Password="55wassim610114";

            $mail ->setFrom("fitouribz11@gmail.com",$name);
            $mail ->addAddress($email);
            $mail ->isHTML(true);
            $mail ->Subject="email verification";
            $email_template="
                  <h2>Developpement web</h2>
                  <a href='http://localhost/login-system/verification.html?token=$verify_token'>Click here </a>
                  <h5>to verify your email address</h5>    
            ";
            $mail ->Body=$email_template;
            $mail ->send();
            
            echo "message sent";
      }
      catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
  
}


if(isset($_POST["submit"])){
      $name=$_POST["name"];
      $email=$_POST["email"];
      $password=$_POST["password"];
      $verify_token=md5(rand());

      $check_email_query = "SELECT email FROM user WHERE email='$email' LIMIT 1";
      $check_email_query_run = mysqli_query($con,$check_email_query);

      if(mysqli_num_rows($check_email_query_run) >0){
            $_SESSION['status']="email Id already exists";
            header("location: register.html");
      }
      else{
            $query="INSERT INTO user (name , email ,password,verify_token) VALUES ('$name','$email','$password','$verify_token')";
            $query_run = mysqli_query($con,$query);
            if($query_run){
                  sendMailer('$name','$email','$verify_token');
                  $_SESSION['status']="Registration Successfull";
                  header("location: login.html");
                  
            }
            else{
                  $_SESSION['status']="Failed to register";
                  header("location: register.html");
            }
      }

}