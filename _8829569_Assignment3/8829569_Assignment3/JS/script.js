
function formHandler(){

  return true;


// fetching input for receipt
  var uname = document.getElementById('uname').value;
  var uphone = document.getElementById('uphone').value;
  var uemail = document.getElementById('uemail').value;
  var postcode = document.getElementById("postcode").value;
  var address = document.getElementById("address").value;
  var city = document.getElementById("city").value;
  var province = document.getElementById("province").value;
  var creditCard = document.getElementById("credit-card").value;
  var expiryMonth = document.getElementById("expiry-month").value;
  var expiryYear = document.getElementById("expiry-year").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;


  var quantityInputOfProduct1= document.getElementById('product1-quantity').value;
  var quantityInputOfProduct2= document.getElementById('product2-quantity').value;
  var quantityInputOfProduct3= document.getElementById('product3-quantity').value;
  var quantityInputOfProduct4= document.getElementById('product4-quantity').value;
  var quantityInputOfProduct5= document.getElementById('product5-quantity').value;
  var quantityInputOfProduct6= document.getElementById('product6-quantity').value;
  var quantityInputOfProduct7= document.getElementById('product7-quantity').value;
  var quantityInputOfProduct8= document.getElementById('product8-quantity').value;
  var quantityInputOfProduct9= document.getElementById('product9-quantity').value;
  var quantityInputOfProduct10= document.getElementById('product10-quantity').value;

    var product1Quantity = parseInt(quantityInputOfProduct1) || 0;
    var product2Quantity = parseInt(quantityInputOfProduct2) || 0;
    var product3Quantity = parseInt(quantityInputOfProduct3) || 0;
    var product4Quantity = parseInt(quantityInputOfProduct4) || 0;
    var product5Quantity = parseInt(quantityInputOfProduct5) || 0;
    var product6Quantity = parseInt(quantityInputOfProduct6) || 0;
    var product7Quantity = parseInt(quantityInputOfProduct7) || 0;
    var product8Quantity = parseInt(quantityInputOfProduct8) || 0;
    var product9Quantity = parseInt(quantityInputOfProduct9) || 0;
    var product10Quantity = parseInt(quantityInputOfProduct10) || 0;

    var product1Price = 5;
    var product2Price = 6;
    var product3Price = 7;
    var product4Price = 8;
    var product5Price = 9;
    var product6Price = 10;
    var product7Price = 11;
    var product8Price = 12;
    var product9Price = 13;
    var product10Price = 14;

  var totalCost = (product1Price * product1Quantity) + (product2Price * product2Quantity) + (product3Price * product3Quantity) + (product4Price * product4Quantity) + (product5Price * product5Quantity) + (product6Price * product6Quantity) + (product7Price * product7Quantity) + (product8Price * product8Quantity) + (product9Price * product9Quantity) + (product10Price * product10Quantity);


  var errors = '';

  if(totalCost<10){
    errors += 'Minimum purchase should be of $10 to proceed<br>';
    return false;
  }

  // Perform form validations
  if (!uname || !uphone || !postcode || !address || !city || !province || !creditCard ||
    !expiryMonth || !expiryYear || !uemail || !password || !confirmPassword) {
    errors += 'All fields are mandatory<br>';
    return false;
  }


  var nameRegex = /^[A-Za-z\s\-]+$/;
  if (!nameRegex.test(uname)) {
    errors += 'Invalid name format. Please use format like John Doe<br>';
    return false;
  }
  
  var phoneRegex = /^[\d\- ]{7,}$/;
  if (!phoneRegex.test(uphone)) {
    errors += 'Invalid phone format. Please use format xxx xxx-xxxx<br>';
    return false;
  }

  var postcodeRegex = /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/;
  if (!postcodeRegex.test(postcode)) {
    errors += 'Invalid postcode format. Please use format like A1A 1A1<br>';
    return false;
  }

  var addressRegex = /^[A-Za-z0-9\s\-,\.]+$/;
  if (!addressRegex.test(address)) {
    errors += 'Invalid address format.<br>';
    return false;
  }

  var cityRegex = /^[A-Za-z\s\-]+$/;
  if (!cityRegex.test(city)) {
    errors += 'Invalid city format. Please use alphabetic characters, spaces, and hyphens<br>';
    return false;
  }



  var creditCardRegex = /^\d{4}-\d{4}-\d{4}-\d{4}$/;
  if (!creditCardRegex.test(creditCard)) {
    errors += 'Invalid credit card format. Please use format xxxx-xxxx-xxxx-xxxx<br>';
    return false;
  }

  // Check expiry month format
  var expiryMonthRegex = /^[A-Za-z]{3}$/;
  if (!expiryMonthRegex.test(expiryMonth)) {
    errors += 'Invalid expiry month format. Please use format MMM<br>';
    return false;
  }

  // Check expiry year format
  var expiryYearRegex = /^\d{4}$/;
  if (!expiryYearRegex.test(expiryYear)) {
    errors += 'Invalid expiry year format. Please use format yyyy<br>';
    return false;
  }

  // Check email format
  var emailRegex = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/;
  if (!emailRegex.test(uemail)) {
    errors += 'Invalid email format. Please use format x@y.z<br>';
    return false;
  }

  // Check if password and confirm password match
  if (password !== confirmPassword) {
    errors += 'password do not match<br>';
    return false;
  }


  var tax;

  switch (province) {
    case 'AB':
      tax = totalCost * 0.13;
      break;
    case 'BC':
      tax = totalCost * 0.14;
      break;
    case 'MB':
      tax = totalCost * 0.12;
      break;
    case 'ON':
      tax = totalCost * 0.11;
      break;
    case 'QB':
      tax = totalCost * 0.15;
      break;
    case 'NF':
      tax = totalCost * 0.16;
      break;
    case 'NS':
      tax = totalCost * 0.12;
      break;
    case 'PE':
      tax = totalCost * 0.13;
      break;
    case 'SK':
      tax = totalCost * 0.11;
      break;
  }

  

  if(errors != ''){
    document.getElementById('errors').innerHTML = errors;
    return false;
  }


  document.getElementById('errors').innerHTML = '';

  // displaying reciept
  document.getElementById('oname').innerHTML = uname;
  document.getElementById('ophone').innerHTML = uphone;
  document.getElementById('oemail').innerHTML = uemail;
  document.getElementById('ototalCost').innerHTML = '$' + totalCost;
  document.getElementById('otax').innerHTML = '$' + tax;
  document.getElementById('ograndTotal').innerHTML = '$' + (totalCost+tax);

return false;


}