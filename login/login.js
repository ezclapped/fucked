function validateForms() {
    let usernamefield = document.getElementById("userelement")
    let usernameerror = document.getElementById("username-error")


    if (usernamefield.value === "") {
        usernameerror.innerHTML = "Please enter your username.";
        return false;
    }

    let passwordfield = document.getElementById("passwortelement")
    let passworderror = document.getElementById("password-error")


    if (passwordfield.value === "") {
        passworderror.innerHTML = "Please enter your password.";
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