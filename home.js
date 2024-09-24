// Get all the plus and minus buttons
const plusButtons = document.querySelectorAll('.plus');
const minusButtons = document.querySelectorAll('.Minus');

// Add event listeners to each plus button
plusButtons.forEach(button => {
    button.addEventListener('click', () => {
        const parent = button.parentElement;
        var quantityElement = parent.querySelector('.QtyNUM').value++;

    });
});

// Add event listeners to each minus button
minusButtons.forEach(button => {
    button.addEventListener('click', () => {
        const parent = button.parentElement;
        var quantityElement = parent.querySelector('.QtyNUM').value;
        if (quantityElement > 1) {
            parent.querySelector('.QtyNUM').value--;
        } else {
            alert("don't enter minus value");
        }

    });
});



$(document).ready(function() {
    $(".addtocartp").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-cart");
        var pid = $form.find(".pid").val();
        var PName = $form.find(".PName").val();
        var PBrand = $form.find(".pBrand").val();
        var PImg = $form.find(".Pimg").val();
        var PPrice = $form.find(".pprice").val();
        var PDiscount = $form.find(".discount").val();
        console.log(pid + PName);
        var carts = document.getElementById('bgitems').innerHTML++;
        $.ajax({
            url: 'cartconfig.php',
            type: 'POST',
            Data: {
                pid: pid,
                PName: PName,
                PBrand: PBrand,
                PImg: PImg,
                PPrice: PPrice,
                PDiscount: PDiscount
            },
            dataType: 'json',
            success: function(response) {
                try {
                    var jsonResponse = JSON.parse(response); // Try parsing JSON
                    if (jsonResponse.status === 'success') {
                        alert('Product added to cart!');
                        // Optionally, update the cart UI here
                    } else {
                        alert(jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON response:', e);
                    console.error('Response:', response);
                    alert('An error occurred while processing your request.');
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', status, error);
                console.log('Response:', xhr.responseText);
            }
        });
    });

});

document.addEventListener("DOMContentLoaded", function() {
    // Select the elements
    const slideContainer = document.querySelector('.containt-slider-div');
    const slides = Array.from(slideContainer.querySelectorAll('.slide-content'));
    const prevBtn = document.getElementById('moveSlideL');
    const nextBtn = document.getElementById('moveSlideR');

    let currentIndex = 0;

    // Function to update the slider position
    function updateSlider() {
        // Calculate the slide width
        const slideWidth = slides[0].offsetWidth;

        // Update the transform property to slide the container
        slideContainer.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
    }

    // Event listener for the previous button
    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            // If at the start, loop to the end
            currentIndex = slides.length - 1;
        }
        updateSlider();
    });

    // Event listener for the next button
    nextBtn.addEventListener('click', function() {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
        } else {
            // If at the end, loop to the start
            currentIndex = 0;
        }
        updateSlider();
    });

    // Initialize the slider position
    updateSlider();
});

// onclick="moveSlide(-1)"