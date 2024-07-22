<?php
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $errors = '';
    $output = '';
    $total = '';
    if(!empty($_POST)){ // to check if the form was submitted

    // fetch all the data from the form
    $name = $_POST['uname'] ?? ''; 
    $email = $_POST['uemail'] ?? ''; 
    $phone = $_POST['uphone'] ?? ''; 
    $postcode = $_POST['postcode'] ?? ''; 
    $address = $_POST['address'] ?? ''; 
    $city = $_POST['city'] ?? ''; 
    $province = $_POST['province'] ?? '';
    $creditCard = $_POST['creditCard'] ?? ''; 
    $expiryMonth = $_POST['expiryMonth'] ?? ''; 
    $expiryYear = $_POST['expiryYear'] ?? ''; 
    $password = $_POST['password'] ?? ''; 
    $confirmPassword = $_POST['confirmPassword'] ?? ''; 
    $province = '' ?? '';
    $product1Quantity = '' ?? '';
    $product2Quantity = '' ?? '';
    


    if(!isset($_POST['product1Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product2Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    else{
        $product1Quantity = $_POST['product1Quantity'];
        $product2Quantity = $_POST['product2Quantity'];  
    }



    // validate data
    if($name == ''){
        $errors .= 'Please enter name <br>';
    }
    if($phone == ''){
        $errors .= 'Please enter phone <br>';
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
    if($province = ''){
        $errors .= 'Please enter province <br>';
    }
    if($creditCard == ''){
        $errors .= 'Please enter creditCard <br>';
    }
    if($expiryMonth == ''){
        $errors .= 'Please enter expiryMonth <br>';
    }
    if($expiryYear == ''){
        $errors .= 'Please enter expiryYear <br>';
    }
    if($email == ''){
        $errors .= 'Please enter uemail <br>';
    }
    if($password == ''){
        $errors .= 'Please enter password <br>';
    }
    if($confirmPassword == ''){
        $errors .= 'Please enter confirmPassword <br>';
    }

    

    $nameRegex = "/^[A-Za-z\s\-]+$/";
    if (!preg_match($nameRegex, $name)) {
        $errors .= 'Invalid name format. Please use format like John Doe<br>';
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



    $creditCardRegex = "/^\d{4}-\d{4}-\d{4}-\d{4}$/";
    if (!preg_match($creditCardRegex, $creditCard)) {
        $errors .= 'Invalid credit card format. Please use format xxxx-xxxx-xxxx-xxxx<br>';
    }

    // Check expiry month format
    $expiryMonthRegex = "/^[A-Za-z]{3}$/";
    if (!preg_match($expiryMonthRegex, $expiryMonth)) {
        $errors .= 'Invalid expiry month format. Please use format MMM<br>';
    }

    // Check expiry year format
    $expiryYearRegex = "/^\d{4}$/";
    if (!preg_match($expiryYearRegex, $expiryYear)) {
        $errors .= 'Invalid expiry year format. Please use format yyyy<br>';
    }

    // Check email format
    $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";
    if (!preg_match($emailRegex, $email)) {
        $errors .= 'Invalid email format. Please use format x@y.z<br>';
    }

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        $errors .= 'password do not match<br>';
    }





    // create output

    if ($errors == ''){
        // calculating products cost
        $cost = ((int)$product1Quantity * 5) + ((int)$product2Quantity * 6);

        if ($cost >= 10){
            $output .= "Name: $name <br>";
            $output .= "Email: $email<br>"; 
            $output .= "Phone: $phone<br>"; 
            $output .= "Postcode: $postcode<br>"; 
            $output .= "address: $address<br>"; 
            $output .= "city: $city<br>"; 
            
            // calculating tax according to province
            if($province = "AB"){
                $tax = $cost * 0.13;
            }
            if($province = "BC"){
                $tax = $cost * 0.11;
            }
            if($province = "MB"){
                $tax = $cost * 0.12;
            }
            if($province = "ON"){
                $tax = $cost * 0.15;
            }
            if($province = "QB"){
                $tax = $cost * 0.14;
            }
            if($province = "NF"){
                $tax = $cost * 0.19;
            }
            if($province = "NS"){
                $tax = $cost * 0.11;
            }
            if($province = "PE"){
                $tax = $cost * 0.12;
            }
            if($province = "SK"){
                $tax = $cost * 0.14;
            }
            $output .= "Cost: $cost<br>"; 
            $output .= "Tax: $tax<br>";     
            
            $total = $cost + $tax;
            $output .= "Total: $total<br>"; 
            }
        else{
            $errors .= 'minimum purchase price is of $10, add more to buy<br>';
        }
    }
    else{
        $errors .= 'PLEASE RESOLVE THESE ERRORS TO PROCEED WITH THE PURCHASE<br>';
    }

    // 1. Create DB connection
    include('includes/db_connection.php');


    // 2. Create SQL Query
    $insertQuery = "INSERT INTO `orders` 
                    (`id`, `name`, `email`, `phone`, `postcode`, `address`, `city`, `total`, `whiteHoodieQuant`, `floralTopQuant` ) 
                    VALUES 
                    (NULL, '$name', '$email', '$phone', '$postcode', '$address', '$city', '$total', '$product1Quantity', '$product2Quantity' )";

    // 3. Execute the SQL Query
    $sqlResult = $db->query($insertQuery);


    if(!$sqlResult){

    //exit($db->error);
    exit('We are sorry, we are facing some problems processing your request');
    }

    if($errors){
        echo $errors;

    }
    else{
        echo $output;
    }

}


    



?>



