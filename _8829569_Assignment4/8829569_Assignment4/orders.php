<?php
  session_start();
  if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
  }

  include('includes/db_connection.php');


  $retrieveQuery = "SELECT * FROM orders";
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
  <link rel="stylesheet" type="text/css" href="CSS/ordersStyles.css">
</head>

<body>
  <header>
  <h2 id="store_name">ShopNest </h2>
  </header>
  <?php
    include('includes/navigation.php');
  ?>
  <main>
    <table class="ordersTable">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Postcode</th>
          <th>address</th>
          <th>city</th>
          <th>White Hoodie Qty</th>
          <th>Floral Top Qty</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
      <?php
          if($sqlResult->num_rows > 0){
            while($row = $sqlResult->fetch_assoc()){
              ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['postcode']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['whiteHoodieQuant']; ?></td>
                <td><?php echo $row['floralTopQuant']; ?></td>
                <td><?php echo $row['total']; ?></td>
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