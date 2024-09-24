var Register_Submit = document.getElementById('RGT-btn')
var lname = document.getElementById("lname");
var fname = document.getElementById("fname");
var email = document.getElementById("email");
var cpass = document.getElementById("Cpass");
var con_pass = document.getElementById("conpass");

Register_Submit.onclick = function() {

    if (lname.value.length > 0 || fname.value.length > 0 || email.value.length > 0 || cpass.value.length > 0 || con_pass.value.length > 0) {
        document.getElementById('container').style.display = 'none';
        document.getElementById('container-otp').style.display = 'Blcok';
    } else {
        Verification.style.display = 'block';
        alert('wait');
    }

}

var Verification = document.getElementById("Verification");
var removeD = document.getElementById("removeD");
removeD.onclick = function() {
    Verification.remove();
}

document.addEventListener('DOMContentLoaded', function() {

    const inputs = document.querySelectorAll('.otp-input');
    const form = document.getElementById('otpForm');

    // Function to handle input focus
    inputs.forEach((input, index) => {
        input.addEventListener('input', function() {
            if (this.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            } else if (this.value.length === 0 && index > 0) {
                inputs[index - 1].focus();
            }
        });

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value.length === 0 && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let otp = '';
        inputs.forEach(input => otp += input.value);

        if (otp.length === inputs.length) {
            alert(`OTP Submitted: ${otp}`);
            // You can handle OTP verification here
        } else {
            alert('Please enter all OTP digits.');
        }
    });
});