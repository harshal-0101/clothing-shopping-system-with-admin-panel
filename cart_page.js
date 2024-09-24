let btn = document.getElementById('cart');
let order = document.getElementById('order');
let Dilevry = document.getElementById('Dilevry');
btn.onclick = function() {
    btn.style.boxShadow = '2px 2px 10px 2px rgb(0, 0, 0)';
    order.style.boxShadow = 'none';
    Dilevry.style.boxShadow = 'none';
    document.getElementById('cart-block').style.display = 'flex';
    document.getElementById('orders-box').style.display = 'none';
}
order.onclick = function() {
    btn.style.boxShadow = 'none';
    Dilevry.style.boxShadow = 'none';
    order.style.boxShadow = '2px 2px 10px 2px rgb(0, 0, 0)';
    document.getElementById('cart-block').style.display = 'none';
    document.getElementById('orders-box').style.display = 'block';
}
Dilevry.onclick = function() {
    btn.style.boxShadow = 'none';
    order.style.boxShadow = 'none';
    Dilevry.style.boxShadow = '2px 2px 10px 2px rgb(0, 0, 0)';

    document.getElementById('cart-block').style.display = 'none';
    document.getElementById('orders-box').style.display = 'none';
}

// ---------paymet------------
document.getElementById('pay-btn').onclick = function() {
    if (document.getElementById('UPI').checked == true) {
        alert("You Pay with UPI");
    } else if (document.getElementById('cart').checked == true) {
        alert("You Pay with cart");
    } else {
        alert("You Pay with other");
    }
}

var loadapp = document.querySelectorAll(".loader");

function load() {
    loadapp.style.display = 'block';
}

document.addEventListener('DOMContentLoaded', () => {
    // Get all the plus and minus buttons
    const quantityButtons = document.querySelectorAll('.quantity-btn');

    quantityButtons.forEach(button => {
        button.addEventListener('click', () => {
            const action = button.dataset.action;
            const form = button.closest('form');
            const quantityInput = form.querySelector('.quantity-input');
            const priceValue = parseFloat(form.querySelector('.price-value').value);
            const totalPriceSpan = document.getElementById('total-price');
            const currentQuantity = parseInt(quantityInput.value);
            const productId = form.querySelector('.cart-item').dataset.productId;
            let quantity;


            let newQuantity = currentQuantity;

            if (action === 'plus') {
                newQuantity++;
                quantity = newQuantity;
            } else if (action === 'minus' && newQuantity > 1) {
                newQuantity--;
                quantity = newQuantity;
            }

            quantityInput.value = newQuantity;

            // Update total price
            // const currentPrice = totalPriceSpan.innerHTML;
            const totalPrice = quantity * priceValue;
            // // var finalTatalPrice = parseInt(currentPrice) + parseFloat(totalPrice.toFixed(2));
            // totalPriceSpan.textContent = parseFloat(totalPrice.toFixed(2));

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'cartconfig.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = () => {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText); // Optional: handle server response
                }
            };
            xhr.send(`product_id=${encodeURIComponent(productId)}&quantity=${encodeURIComponent(quantity)}&total_price=${encodeURIComponent(totalPrice.toFixed(2))}`);
            updateCart();
        });
    });
});

// Function to update cart
function updateCart(productId, quantity, totalPrice) {
    fetch('cartconfig.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'product_id': productId,
                'quantity': quantity,
                'total_price': totalPrice
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Update the UI with the new total price
                const totalPriceSpan = document.getElementById('total-price').innerText = data.total_price;
            } else {
                alert('Update failed: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}