<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Register</title>
      <link rel="stylesheet" href="style.css">
      <script src="script.js"></script>
</head>
<body>


  <?php
    session_start();
    if(isset($_SESSION['status'])) {
      echo '<script>alert("' . $_SESSION['status'] . '");</script>';
      unset($_SESSION['status']);
    }
  ?>


<div class="login-box">
  
  <p>Register</p>
  <form action="signup.php" method="post" >
    <div class="user-box">
      <input required="" name="name" type="text" id="name" >
      <label>Name</label>
    </div>
    <div class="user-box">
      <input required="" name="email" type="email" id="email">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input required="" name="password" type="password" id="password">
      <label>Password</label>
    </div>
    <div class="user-box">
      <input required="" name="confPassword" type="password" id="confPassword">
      <label>Repeat Password</label>
    </div>
    <button name="submit">
      Submit
    </button>
  </form>
  <p>Already have have an account ? <a href="login.php" class="a2">Sign in!</a></p>
</div>
      
</body>
</html>