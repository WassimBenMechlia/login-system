<?php
session_start();

include('dbcon.php');

if(isset($_POST['login'])){
      if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            
            $login_query= "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
            $login_query_run = mysqli_query($con,$login_query);

            if(mysqli_num_rows($login_query_run) >0){
                  $row = mysqli_fetch_array($login_query_run);
                  //echo $row['name'];
                  $_SESSION['authentication']=true;
                  $_SESSION['user_auth']= [
                        'username' => $row['name'],
                        'email' => $row['email'],
                  ];
                  $_SESSION['session']="You are logged in successfully";
                  header("Location: dashboard.php");
            }
            else{
                  $_SESSION['status'] = "Email or password incorrect";
                  header("Location: login.php");
                  exit(0);
            }

      }
      else{
            $_SESSION['status'] = "All fields are required";
            header("Location: login.php");
            exit(0);
      }

}

?>