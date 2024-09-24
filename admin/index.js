// You can add JavaScript here for form validation or other interactions
// For example, validating the form before submission

const form = document.getElementById('addProductForm');

form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting by default

    // Example validation: Check if required fields are filled
    const productName = document.getElementById('productName').value.trim();
    const productPrice = document.getElementById('productPrice').value.trim();
    const productDetails = document.getElementById('productDetails').value.trim();

    if (productName === '' || productPrice === '' || productDetails === '') {
        alert('Please fill in all required fields: Product Name, Product Price, Product Details');
        return;
    }

    submit();
});

function submit() {
    console.log(document.getElementById('productDetails').innerHTML)
}

var btn = document.querySelectorAll(".btn")

btn[0].onclick = function() {
    document.getElementById('insertProduct').style.display = 'block';
    document.getElementById('ourProduct').style.display = 'none';
    document.getElementById('Users').style.display = 'none';
}
btn[1].onclick = function() {
    document.getElementById('ourProduct').style.display = 'block';
    document.getElementById('insertProduct').style.display = 'none';
    document.getElementById('Users').style.display = 'none';
}
btn[2].onclick = function() {
    document.getElementById('ourProduct').style.display = 'none';
    document.getElementById('insertProduct').style.display = 'none';
    document.getElementById('Users').style.display = 'block';
}