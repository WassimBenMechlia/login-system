<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="dashStyle.css">
</head>
<body>
<?php
      session_start();
     
      if(!$_SESSION['authentication']){
            $_SESSION['status'] ="Please login again !";
            header("Location: login.php");
} 
?>

<nav>
      <div class="logo">
      <a >Dashboard</a>
      </div>
      <form method="post" action="dashboardcode.php" >
            <button name="logout">Logout</button>
      </form>

</nav>


<head>
    <title>Welcome to my page</title>
  </head>
  <body>
    <h1>Welcome to my page!</h1>
    <p>Thanks for visiting <b><?php 
      
      
    echo $_SESSION['user_auth']['username'] ;?></b> </p>
  </body>
      
      

</body>
</html>