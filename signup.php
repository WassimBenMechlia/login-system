<?php
session_start();
include("dbcon.php");
//load .env variables
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


function sendMailer($name,$setEmail){
      $smtp_host = $_ENV['SMTP_HOST'];
      $smtp_user = $_ENV['SMTP_USER'];
      $smtp_port = $_ENV['SMTP_PORT'];
      $smtp_pass = $_ENV['SMTP_PASS'];


      $mail = new PHPMailer(true);

      $mail->isSMTP(); 
      $mail->Host = $smtp_host;
      $mail->SMTPAuth   = true; 

      $mail->Username = $smtp_user;                 
      $mail->Password = $smtp_pass;
      $mail->Port = $smtp_port;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 

      $mail->isHTML(true);

      $mail ->setFrom("fitouribz11@gmail.com","Dev Web");
      $mail ->addAddress($_POST["email"]);

      $mail ->Subject="email verification";
      
      $email_template=" <h2>Developpement web</h2> 
            <h5>You have successfully created an account <a href='http://localhost/login-system/login.php'>Click here</a> to log in </h5>"; 
      $mail ->Body=$email_template;

      try {
            $mail->send();
            $_SESSION['status']="Registration Successfull";
            header("location: login.php");
      } catch (Exception $e) {
            $_SESSION['status']="Failed to register";
            header("location: register.php");
      }
      
      //echo "message sent";

  
}


if(isset($_POST["submit"])){
      $name=$_POST["name"];
      $setEmail=$_POST["email"];
      $password=$_POST["password"];
      

      $check_email_query = "SELECT email FROM user WHERE email='$setEmail' LIMIT 1";
      $check_email_query_run = mysqli_query($con,$check_email_query);

      if(mysqli_num_rows($check_email_query_run) >0){
            $_SESSION['status']="email Id already exists";
            header("location: register.php");
      }
      else{
            $query="INSERT INTO user (name , email ,password) VALUES ('$name','$setEmail','$password')";
            $query_run = mysqli_query($con,$query);
            if($query_run){
                  sendMailer('$name','$setEmail');
            }
            else{
                  $_SESSION['status']="Failed to register";
                  header("location: register.php");
            }
      }

}