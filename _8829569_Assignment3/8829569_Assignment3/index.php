<?php
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $errors = '';
    $output = '';
    if(isset($_POST['submit'])){ // to check if the form was submitted

    // fetch all the data from the form
    $name = $_POST['uname']; 
    $email = $_POST['uemail']; 
    $phone = $_POST['uphone']; 
    $postcode = $_POST['postcode']; 
    $address = $_POST['address']; 
    $city = $_POST['city']; 
    $province = $_POST['province'];
    $creditCard = $_POST['creditCard']; 
    $expiryMonth = $_POST['expiryMonth']; 
    $expiryYear = $_POST['expiryYear']; 
    $password = $_POST['password']; 
    $confirmPassword = $_POST['confirmPassword']; 
    $province = '';
    $product1Quantity = '';
    $product2Quantity = '';
    $product3Quantity = '';
    $product4Quantity = '';
    $product5Quantity = '';
    $product6Quantity = '';
    $product7Quantity = '';
    $product8Quantity = '';
    $product9Quantity = '';
    $product10Quantity = '';


    if(!isset($_POST['product1Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product2Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product3Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product4Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product5Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product6Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product7Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product8Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product9Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    if(!isset($_POST['product10Quantity'])){
        $errors .= 'Please enter item quantity <br>';
    }
    else{
        $product1Quantity = $_POST['product1Quantity'];
        $product2Quantity = $_POST['product2Quantity'];
        $product3Quantity = $_POST['product3Quantity'];
        $product4Quantity = $_POST['product4Quantity'];
        $product5Quantity = $_POST['product5Quantity'];
        $product6Quantity = $_POST['product6Quantity'];
        $product7Quantity = $_POST['product7Quantity'];
        $product8Quantity = $_POST['product8Quantity'];
        $product9Quantity = $_POST['product9Quantity'];
        $product10Quantity = $_POST['product10Quantity'];
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

    $phoneRegex = "/^[0-9]{3}\-[0-9]{3}\-[0-9]{4}$/";
    if(!preg_match($phoneRegex, $phone)){
        $errors .= 'Please enter phone in format 123-123-1234 <br>';
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
        $cost = ((int)$product1Quantity * 5) + ((int)$product2Quantity * 6) + ((int)$product3Quantity * 7) + ((int)$product4Quantity * 8) + ((int)$product5Quantity * 9) + ((int)$product6Quantity * 10) + ((int)$product7Quantity * 11) + ((int)$product8Quantity * 12) + ((int)$product9Quantity * 13) + ((int)$product10Quantity * 14);

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
}


?>



<!DOCTYPE html>
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
        <h2 id="store_name">ShopNest </h2>

    </header>

    <nav>
        <a href="index.html"> Home</a>
        <a href="#"> Shop</a>
        <a href="#"> Blog</a>
        <a href="#"> Contact</a>
    </nav>


    <main>


        <div class="carousel">
            <div class="carousel-left">
                <h1>Elevate your style <br> with our curated collection.</h1>
                <h1 class="shop-now">SHOP NOW</h1>
            </div>
            
            <div class="carousel-right">
                <img src="images/rrrCarousel-left.jpg" alt="carousel-right-pic" class="carousel-jp">
            </div>
        </div>

        <div class="colored-box-flex">
            <div class="men-box">MEN</div>
            <div class="women-box">WOMEN</div>
            <div class="kids-box">KIDS</div>
        </div>

        <form onsubmit="return formHandler();" id="purchase-form" action="" method="POST" name="recieptForm">

        <div class="products-section">
            <h2>Featured Products</h2>
            <div class="featured-products">
                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product1.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            White Hoodie <br>
                            $5.00
                            <input type="number" id="product1Quantity" min="0" value="0" name = "product1Quantity">
                        </div>
                    </div>
                </div>


                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product2.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            Floral Top <br>
                            $6.00
                            <input type="number" id="product2Quantity" min="0" value="0" name = "product2Quantity">
                        </div>
                    </div>
                </div>



                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product3.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            White T-shirt <br>
                            $7.00
                            <input type="number" id="product3Quantity" min="0" value="0" name = "product3Quantity">
                        </div>
                    </div>
                </div>



                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product4.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            Yellow Jacket <br>
                            $8.00
                            <input type="number" id="product4Quantity" min="0" value="0" name = "product4Quantity">
                        </div>
                    </div>
                </div>


                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product5.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            Shorts <br>
                            $9.00
                            <input type="number" id="product5Quantity" min="0" value="0" name = "product5Quantity">
                        </div>
                    </div>
                </div>

                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product6.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            Purple Hoodie <br>
                            $10.00
                            <input type="number" id="product6Quantity" min="0" value="0" name = "product6Quantity">
                        </div>
                    </div>
                </div>


                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product7.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            Bucket Hat <br>
                            $11.00
                            <input type="number" id="product7Quantity" min="0" value="0" name = "product7Quantity">
                        </div>
                    </div>
                </div>

                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product8.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            White T-shirt <br>
                            $12.00
                            <input type="number" id="product8Quantity" min="0" value="0" name = "product8Quantity">
                        </div>
                    </div>
                </div>


                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product9.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            Shoes <br>
                            $13.00
                            <input type="number" id="product9Quantity" min="0" value="0" name = "product9Quantity">
                        </div>
                    </div>
                </div>


                <div class="product-container">
                    <div class="product-pic-container">
                        <img src="images/product10.jpg" alt="product1" id="product-pic">
                    </div>
                    <div class="product-info-container">
                        <div class="product-name">
                            White Heals <br>
                            $14.00
                            <input type="number" id="product10Quantity" min="0" value="0" name = "product10Quantity">
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="order-container">
            <div class="order-form">
                <h2>Order Form:</h2>
                

                    <div class="name-field">
                        <label for="uname">Name:</label>
                        <input type="text" id="uname" name="uname">
                    </div>

                    <div class="phone-field">
                        <label for="uphone">Phone:</label>
                        <input type="text" id="uphone" name="uphone">
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
                        <select id="province" name = "province">
                            <option value="">Select Province</option>
                            <option value="AB">Alberta</option>
                            <option value="BC">British Columbia</option>
                            <option value="MB">Manitoba</option>
                            <option value="ON">ONTARIO</option>
                            <option value="QB">QUEBEC</option>
                            <option value="NF">NEW FOUNDLAND</option>
                            <option value="NS">NOVA SCOTIA</option>
                            <option value="PE">PRINCE EDWARD ISLAND</option>
                            <option value="SK">SASKATCHEWAN</option>
                        </select>
                    </div>

                    <div class="cc-field">
                        <label for="credit-card">Credit Card:</label>
                        <input type="text" id="creditCard" name="creditCard">
                    </div>

                    <div class="cc-expm-field">
                        <label for="expiry-month">Credit Card Expiry Month:</label>
                        <input type="text" id="expiryMonth" name="expiryMonth">
                    </div>

                    <div class="cc-expy-field">
                        <label for="expiry-year">Credit Card Expiry Year:</label>
                        <input type="text" id="expiryYear" name="expiryYear">
                    </div>

                    <div class="email-field">
                        <label for="uemail">Email:</label>
                        <input type="text" id="uemail" name="uemail">
                    </div>

                    <div class="pwd-field">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <div class="pwd-confirm-field">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword">
                    </div>

                    <div id="submit-button">
                        <input type="submit" value="submit" name="submit">
                    </div>

                    <p id="errors">
                        <?php
                            if($errors){
                            echo $errors;
                            }
                        ?>
                    </p>
                </form>


            </div>
            <div id="product-orders">
                <h2>Receipt:</h2>
                <p id="formResult">
                    <?php
                        if($output){
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
                <p>Email: info@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </div>
        <div class="bottom-footer">
            <p>&copy; 2023 Your Ecommerce Website. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>