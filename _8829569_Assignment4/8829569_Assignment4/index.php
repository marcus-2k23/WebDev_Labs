<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="JS/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script>

  


    $(document).ready(function(){
        $('#purchase-form').on('submit', function(e){
            // stop the form from submitting
            e.preventDefault();
            // fetch all the fields
            var name = $('#uname').val();
            var email = $('#uemail').val(); 
            var phone = $('#uphone').val(); 
            var postcode = $('#postcode').val(); 
            var address = $('#address').val(); 
            var city = $('#city').val(); 
            
            // ajax call
            $.ajax({
                type    : 'POST',
                url     : 'ajaxprocess.php',
                data    : {
                    uname     : uname, 
                    uemail    : uemail,  
                    uphone    : uphone,  
                    postcode : postcode,  
                    address  : address,  
                    city   : city
                    total  : total
                },
                success : function(processedData){
                    $('#formResult').html(processedData);
                }
            });
        });

    });

  </script>
</head>

<body>

    <header>
        <h2 id="store_name">ShopNest </h2>

    </header>

    <?php
    include('includes/navigation.php');
     ?>


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

        <form onsubmit="return formHandler();" id="purchase-form" action="" method="POST" name="receiptForm">

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
                            <input type="number" id="product1Quantity" min="0" value="0" name = "product1Quantity" >
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
                            <input type="number" id="product2Quantity" min="0" value="0" name = "product2Quantity" >
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
                        
                    </p>
                </form>


            </div>
            <div id="product-orders">
                <h2>Receipt:</h2>
                <p id="formResult">
                    
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