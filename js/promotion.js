document.getElementById('referralCode').addEventListener('input', function() {
    var referralCode = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/check-code.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var itemPrice = parseFloat(document.getElementById('itemPrice').innerText);
            var shippingCost = 2.99;
            var totalPriceElement = document.getElementById('totalPrice');
            
            if (response.valid) {
                var discount = response.discount;
                var discountedPrice = itemPrice - discount;
                totalPriceElement.innerText = (discountedPrice + shippingCost).toFixed(2) + '€';
                totalPriceElement.style.color = 'green';
            } else {
                totalPriceElement.innerText = (itemPrice + shippingCost).toFixed(2) + '€';
                totalPriceElement.style.color = 'red';
            }
        }
    };
    xhr.send('referralCode=' + encodeURIComponent(referralCode));
});
