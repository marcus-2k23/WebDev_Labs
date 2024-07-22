<?php 
// start the session
session_start();
include('includes/db_connection.php');


// checking if login or not
if(!empty($_POST)){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sqlQuery = "SELECT * FROM `user_login` WHERE `username` = '$username' AND `password` = '$password'";

  $sqlResult = $db->query($sqlQuery);

  if($sqlResult->num_rows == 1){
    // redirecting user to login
    while($row = $sqlResult->fetch_assoc() ){
      $_SESSION['username'] = $row['username'];
      $_SESSION['loggedIn'] = true;
      break;
    }
    //echo $_SESSION['username'];
    header('Location: registrations.php');

  }

}



?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/custom.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="CSS/loginStyles.css">
</head>

<body>
  <header>
    
  <h2 id="store_name">IT Demo Registration </h2>
  </header>
  <?php
    include('includes/navigation.php');
  ?>
  <main>
    <form name="loginForm" method="Post" action="">
      <label>Username</label>
      <input id="username" type="text" name="username"><br />

      <label>Password</label>
      <input id="password" type="password" name="password"><br />


      <br /><br />

      <input type="submit" name="submit" value="Login">
      <p id="errors"></p>
    </form>
  </main>
  
  <div class="clear"></div>
</body>

</html>