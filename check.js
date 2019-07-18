function check(theForm) {
    var userName = theForm.inputUserName;
    var email = theForm.inputEmail;
    var password = theForm.inputPassword;
    var confirmPassword = theForm.inputConfirmPassword;
    var agree=theForm.agree; 
    var check = new Boolean(true);
    
    if(userName.value == ""){
        alert("Please enter username!");
        check = false;
    }
    if(email.value == ""){
        alert("Please enter email address!");
        check = false;
    }
    if(password.value == ""){
        alert("Please enter password!");
        check = false;
    }
    if(confirmPassword.value == ""){
        alert("Please confirm your password!");
        check = false;
    }
    if(password.value != "" && confirmPassword.value != "" && password.value != confirmPassword.value){
        alert("Passwords must match!");
        check = false;
    }
    if(agree.checked == false){
        alert("Please agree to the Terms and Condtions!");
        check = false;
    }
    if(check == true)
        theForm.submit();
}