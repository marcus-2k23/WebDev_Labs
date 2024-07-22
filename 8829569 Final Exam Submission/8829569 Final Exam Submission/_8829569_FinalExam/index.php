<?php
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $errors = '';
    $output = '';
    if(isset($_POST['submit'])){ // checking if the form was submitted

    // fetching all the data from the form
    $tname = $_POST['tname']; 
    $cname = $_POST['cname'];
    $sname = $_POST['sname']; 
    $ssname = $_POST['ssname'];
    $semail = $_POST['semail']; 
    $ssemail = $_POST['ssemail'];
    $postcode = $_POST['postcode']; 
    $address = $_POST['address']; 
    $city = $_POST['city']; 
    $province = $_POST['province'];
    $projname = $_POST['projname'];
    $projdesc = $_POST['projdesc'];
 

    // validating the data fetched form the form
    if($tname == ''){
        $errors .= 'Please enter team name <br>';
    }
    if($cname == ''){
        $errors .= 'Please enter college name <br>';
    }
    if($sname == ''){
        $errors .= 'Please enter student name <br>';
    }
    if($ssname == ''){
        $errors .= 'Please enter Second student name <br>';
    }

    if($postcode == ''){
        $errors .= 'Please enter postcode <br>';
    }
    if($address == ''){
        $errors .= 'Please enter address <br>';
    }
    if($city == ''){
        $errors .= 'Please enter city <br>';
    }
    if($province == ''){
        $errors .= 'Please enter province <br>';
    }
    if($projname == ''){
        $errors .= 'Please enter project name <br>';
    }
    if($projdesc == ''){
        $errors .= 'Please enter project description <br>';
    }

    if($semail == ''){
        $errors .= 'Please enter student 1 email <br>';
    }
    if($ssemail == ''){
        $errors .= 'Please enter second student email <br>';
    }


    $nameRegex = "/^[A-Za-z\s\-]+$/";
    if (!preg_match($nameRegex, $tname)) {
        $errors .= 'Invalid team name format. Please use format like XYZ ABC<br>';
    }
    if (!preg_match($nameRegex, $cname)) {
        $errors .= 'Invalid college name format. Please use format like XYZ ABC<br>';
    }
    if (!preg_match($nameRegex, $sname)) {
        $errors .= 'Invalid student name format. Please use format like XYZ ABC<br>';
    }
    if (!preg_match($nameRegex, $ssname)) {
        $errors .= 'Invalid second student name format. Please use format like XYZ ABC<br>';
    }
    if (!preg_match($nameRegex, $projname)) {
        $errors .= 'Invalid project name format. Please use format like XYZ ABC<br>';
    }
    if (!preg_match($nameRegex, $projdesc)) {
        $errors .= 'Invalid project description format. Please use format like XYZ ABC<br>';
    }
    if (!preg_match($nameRegex, $province)) {
        $errors .= 'Invalid province format. Please use format like XYZ ABC<br>';
    }
    

    $postcodeRegex = "/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/";
    if (!preg_match($postcodeRegex, $postcode)) {
        $errors .= 'Invalid postcode format. Please use format like A1A 1A1<br>';
    }

    $addressRegex = "/^[A-Za-z0-9\s\-,\.]+$/";
    if (!preg_match($addressRegex, $address)) {
        $errors .= 'Invalid address format.<br>';
    }

    $cityRegex = "/^[A-Za-z\s\-]+$/";
    if (!preg_match($cityRegex, $city)) {
        $errors .= 'Invalid city format. Please use alphabetic characters, spaces, and hyphens<br>';
    }

    // Check email format
    $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";
    if (!preg_match($emailRegex, $semail)) {
        $errors .= 'Invalid student 1 email format. Please use format x@y.z<br>';
    }
    if (!preg_match($emailRegex, $ssemail)) {
        $errors .= 'Invalid second student email format. Please use format x@y.z<br>';
    }


    // creating output
    if ($errors == ''){
            $output .= "Team Name: $tname <br><br>";
            $output .= "College Name: $cname <br><br>";
            $output .= "First Student Name: $sname <br><br>";
            $output .= "Second Student Name: $ssname <br><br>";
            $output .= "First Student Email: $semail<br><br>"; 
            $output .= "Second Student Email: $ssemail<br><br>"; 
            $output .= "Postcode: $postcode<br><br>"; 
            $output .= "address: $address<br><br>"; 
            $output .= "city: $city<br><br>"; 
            $output .= "Province: $province<br><br>"; 
            
    }
    else{
        $errors .= 'PLEASE RESOLVE THESE ERRORS TO PROCEED WITH THE PURCHASE<br>';
    }

    // Creating connection to the database
    include('includes/db_connection.php');


    if ($errors == ''){
        // Create SQL Query
        $insertQuery = "INSERT INTO `registrations` 
                        (`id`, `tname`, `cname`, `sname`, `ssname`, `semail`, `ssemail`, `postcode`, `address`, `city`, `province`, `projname`, `projdesc` ) 
                        VALUES 
                        (NULL, '$tname', '$cname', '$sname', '$ssname', '$semail', '$ssemail', '$postcode', '$address', '$city', '$province', '$projname', '$projdesc' )";

        // Executing the SQL Query inserting the fetched data from form
        $sqlResult = $db->query($insertQuery);


        if(!$sqlResult){

        //exiting the database ($db->error);
        exit('We are sorry, we are facing some problems processing your request');
        }
    }

}


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="JS/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <h2 id="store_name">IT Demo Registration </h2>

    </header>

    <?php
    include('includes/navigation.php');
     ?>

    <main>
        <div class="carousel">
            <div class="carousel-left">
                <h1>IT Demo <br> Registrations open NOW.</h1>
                <h4 class="shop-now">Fill the form below to register</h4>
            </div>
            
            <div class="carousel-right">
                
            </div>
        </div>


        <form onsubmit="return formHandler();" id="purchase-form" action="" method="POST" name="recieptForm">



        <div class="order-container">
            <div class="order-form">
                <h2>Registration Form:</h2>
                    <div class="name-field">
                        <label for="tname">Team Name:</label>
                        <input type="text" id="tname" name="tname">
                    </div>

                    <div class="name-field">
                        <label for="cname">College Name:</label>
                        <input type="text" id="cname" name="cname">
                    </div>

                    <div class="postcode-field">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode">
                    </div>

                    <div class="address-field">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address">
                    </div>

                    <div class="city-field">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city">
                    </div>

                    <div class="province-field">
                        <label for="province">Province:</label>
                        <input type="text" id="province" name="province">
                    </div>

                    <div class="name-field">
                        <label for="sname">First Student Name:</label>
                        <input type="text" id="sname" name="sname">
                    </div>

                    <div class="name-field">
                        <label for="ssname">Second Student Name:</label>
                        <input type="text" id="ssname" name="ssname">
                    </div>

                    <div class="email-field">
                        <label for="semail">First Student Email:</label>
                        <input type="text" id="semail" name="semail">
                    </div>

                    <div class="email-field">
                        <label for="ssemail">Second Student Email:</label>
                        <input type="text" id="ssemail" name="ssemail">
                    </div>

                    <div class="name-field">
                        <label for="projname">Project Name:</label>
                        <input type="text" id="projname" name="projname">
                    </div>
                    <div class="name-field">
                        <label for="projdesc">Project Description:</label>
                        <input type="text" id="projdesc" name="projdesc">
                    </div>

                    <div id="submit-button">
                        <input type="submit" value="submit" name="submit">
                    </div>

            
                </form>


            </div>
            <div id="product-orders">
                <p id="errors">
                            <?php
                                if($errors){
                                    echo "<h3>ERRORS: </h3>";
                                    echo $errors;
                                }
                            ?>
                        </p>
                <p id="formResult">
                    <?php
                        if($output){
                            echo "<h3>SUBMITTED FORM DETAILS: </h3>";
                            echo $output;
                        }
                    ?>
                </p>
            </div>
        </div>


    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend lacus at consequat efficitur.
                    Proin pretium euismod dolor, eget rhoncus lectus lobortis ac.Maecenas gravida sem id nunc convallis,
                    et imperdiet est consequat.</p>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>Email: aaaa@exexe.com</p>
                <p>Phone: 201 123-0973</p>
            </div>
        </div>
        <div class="bottom-footer">
            <p>&copy; 2023 Your IT DEMO Website. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>