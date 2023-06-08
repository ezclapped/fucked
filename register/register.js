function validateForms() {

    //USERNAME
    let usernamefield = document.getElementById("userelement")
    let usernameerror = document.getElementById("username-error")

    if (usernamefield.value === "") {
        usernameerror.innerHTML = "Please enter your username.";
        return false;
    }

    //PASSWORD
    let passwordfield = document.getElementById("passwortelement")
    let passworderror = document.getElementById("password-error")


    if (passwordfield.value === "") {
        passworderror.innerHTML = "Please enter your password.";
        return false;
    }

    //PASSWORD CONFIRM
    let confirmfield = document.getElementById("passwordconfirmelement")
    let confirmerror = document.getElementById("confirm-error")


    if (confirmfield.value === "") {
        confirmerror.innerHTML = "Please confirm your password.";
        return false;
    }

    //LICENSE
    let licensefield = document.getElementById("licenseelement")
    let licenseerror = document.getElementById("license-error")


    if (licensefield.value === "") {
        licenseerror.innerHTML = "Please enter a valid license key.";
        return false;
    }

    // Check if password has the right length


    // Check if password is the same
    var password = document.getElementById('passwortelement').value;
    var passwordConfirm = document.getElementById('passwordconfirmelement').value;

    if (password === passwordConfirm) {}
    else {
        confirmerror.innerHTML = "Your passwords do not match"
        return false;
    }

    // CAPTCHA
    let captchaElement = document.querySelector('.h-captcha');
    var isHCaptchaChecked = hcaptcha.getResponse();

    if (isHCaptchaChecked) {
        return true;
    } else {
        let captchaerror = document.getElementById("captcha-error")
        captchaerror.innerHTML = "Please check the captcha box."
        return false;
    }

}


function togglePasswordVisibility() {
    var passwordInput = document.getElementById('passwortelement');
    var passwordToggle = document.getElementById('passwordToggle');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.classList.remove('fa-eye-slash');
        passwordToggle.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        passwordToggle.classList.remove('fa-eye');
        passwordToggle.classList.add('fa-eye-slash');
    }
}

function wrongLicenseKey() {
    alert("Invalid or already used license key.")
}
