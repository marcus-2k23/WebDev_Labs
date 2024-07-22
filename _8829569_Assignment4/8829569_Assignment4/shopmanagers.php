<?php
  session_start();
  if(!isset($_SESSION['loggedIn']) || $_SESSION['role'] !== 'admin'){
    header('Location: login.php');
  }

  // Create DB connection
  include('includes/db_connection.php');


    $errors = '';
    $output = '';
    if(isset($_POST['submit'])){ // to check if the form was submitted

    // fetch all the data from the form
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $confirmPassword= $_POST['cpassword'];
 

   
    if($password == ''){
        $errors .= 'Please enter password <br>';
    }
    if($confirmPassword == ''){
        $errors .= 'Please enter confirmPassword <br>';
    }

    
    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        $errors .= 'password do not match<br>';
    }



    // 2. Create SQL Query
    $insertQuery = "INSERT INTO `user_login` 
                    (`id`, `username`, `password`, `role` ) 
                    VALUES 
                    (NULL, '$username', '$password', 'manager')";

    // 3. Execute the SQL Query
    $sqlResult = $db->query($insertQuery);


    if(!$sqlResult){

    exit($db->error);
    exit('We are sorry, cannot process at this time....');
    }

    if($errors){
        echo $errors;

    }
    else{
        echo $output;
    }

}



?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shop Manager Creator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/custom.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="CSS/ordersStyles.css">
</head>

<body>
  <header>
  <h2 id="store_name">ShopNest </h2>
    Welcome Admin!
  </header>
  <?php
    include('includes/navigation.php');
  ?>
  <main>
  <form name="loginForm" method="Post" action="">
    <h2>Create new manager account</h2>
      <label>Username</label>
      <input id="username" type="text" name="username"><br />

      <label>Password</label>
      <input id="password" type="password" name="password"><br />

      <label>Confirm Password</label>
      <input id="cpassword" type="password" name="cpassword"><br />


      <br /><br />

      <input type="submit" name="submit" value="Create">
      <p id="errors"></p>
    </form>
  </main>

</body>

</html>