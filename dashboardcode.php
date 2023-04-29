<?php  
      session_start(); 
      
      unset( $_SESSION['authentication']);      
      unset( $_SESSION['user_auth']);      
      $_SESSION['status'] ="You have succesfully logged out";
      header("Location: login.php");      
         

?>