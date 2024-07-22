<?php
  session_start();
  if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
  }

  include('includes/db_connection.php');


  $retrieveQuery = "SELECT * FROM registrations";
  $sqlResult = $db->query($retrieveQuery);
  $resultCheck = mysqli_num_rows($sqlResult);

?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/custom.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="CSS/registrationsStyles.css">
</head>

<body>
  <header>
  <h2 id="store_name">IT Demo Registration </h2>
  </header>
  <?php
    include('includes/navigation.php');
  ?>
  <main>
    <table class="ordersTable">
      <thead>
        <tr>
          <th>Registration Number</th>
          <th>Team Name</th>
          <th>College Name</th>
          <th>First Student Name</th>
          <th>Second Student Name</th>
          <th>First Student Email</th>
          <th>Second Student Email</th>
          <th>Postcode</th>
          <th>address</th>
          <th>city</th>
          <th>Province</th>
          <th>Project Name</th>
          <th>Project Description</th>
        </tr>
      </thead>
      <tbody>
      <?php
          if($sqlResult->num_rows > 0){
            while($row = $sqlResult->fetch_assoc()){
              ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['tname']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['ssname']; ?></td>
                <td><?php echo $row['semail']; ?></td>
                <td><?php echo $row['ssemail']; ?></td>
                <td><?php echo $row['postcode']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['province']; ?></td>
                <td><?php echo $row['projname']; ?></td>
                <td><?php echo $row['projdesc']; ?></td>
              </tr>
              <?php
            }
          }
          else{
            echo "
              <tr>
                <td>No records found</td>
              </tr>
            ";
          }
        ?>
      </tbody>
    </table>
  </main>

</body>

</html>