


function formHandler() {

    // getting values
    var scrunchiesQuantityInput = document.getElementById('scrunchies-qty').value;
    var flowerPotQuantityInput = document.getElementById('flowerPot-qty').value;
    var glovesQuantityInput = document.getElementById('gloves-qty').value;
    var uname = document.getElementById('uname').value;
    var clientID = document.getElementById('clientID').value;


    var errors = '';

    if (!uname || !clientID) {
        errors = errors + 'Please Fill All Fields to Continue<br>';
        return false;
      }

    // regex for product input quantity
    var scrunchiesQuantityInputCheckRegex = /^[0-9]*$/;
    if (!scrunchiesQuantityInputCheckRegex.test(scrunchiesQuantityInput)) {
        errors = errors + 'Invalid product quantity<br>';
        return false;
    }

    // regex for product input quantity
    var flowerPotQuantityInputCheckRegex = /^[0-9]*$/;
    if (!flowerPotQuantityInputCheckRegex.test(flowerPotQuantityInput)) {
        errors = errors + 'Invalid product quantity<br>';
        return false;
    }

    // regex for product input quantity
    var glovesQuantityInputCheckRegex = /^[0-9]*$/;
    if (!glovesQuantityInputCheckRegex.test(glovesQuantityInput)) {
        errors = errors + 'Invalid product quantity<br>';
        return false;
    }

    // converting input data to float and hard-coading product base value
    var scrunchiesQty = parseFloat(scrunchiesQuantityInput) || 0;
    var flowerPotsQty = parseFloat(flowerPotQuantityInput) || 0;
    var gloveQty = parseFloat(glovesQuantityInput) || 0;
    var scrunchiesCost = 21.99;
    var flowerPotsCost = 22.50;
    var gloveCost = 41.99;

    // claculating total of each product
    var scrunchiesTotalCost = scrunchiesQty * scrunchiesCost;
    var flowerPotTotalCost = flowerPotsQty * flowerPotsCost;
    var glovesTotalCost = gloveQty * gloveCost;


    // regex for name
    var namecheckRegex = /^[A-Za-z\s\-]+$/;
    if (!namecheckRegex.test(uname)) {
        errors = errors + 'Invalid name format<br>';
        return false;
    }


    // outputing errors 
    if(errors != ''){
        document.getElementById('outputErrors').innerHTML = errors;
        return false;
    }

    

    // outputing user info and receipt
    document.getElementById('outputName').innerHTML = uname;
    document.getElementById('outputClientID').innerHTML = clientID;

    document.getElementById('outputScrunchiesQty').innerHTML = scrunchiesQty;
    document.getElementById('outputFlowerPotQty').innerHTML = flowerPotsQty;
    document.getElementById('outputGlovesQty').innerHTML = gloveQty;

    document.getElementById('outputScrunchiesTCost').innerHTML = scrunchiesTotalCost;
    document.getElementById('outputFlowerPotTCost').innerHTML = flowerPotTotalCost;
    document.getElementById('outputGlovesTCost').innerHTML = glovesTotalCost;

    var subTotal = scrunchiesTotalCost + flowerPotTotalCost + glovesTotalCost;
    document.getElementById('outputTotalCost').innerHTML = subTotal;

    var tax = 0.13 * subTotal;
    document.getElementById('outputTax').innerHTML = tax;

    var grandTotal = subTotal + tax;
    document.getElementById('outputGrandTotal').innerHTML = grandTotal;


    return false;


}