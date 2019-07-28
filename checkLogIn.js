function check(theForm) {
    var userName = theForm.inputUserName;
    var password = theForm.inputPassword;
    var check = new Boolean(true);
    
    if(userName.value == ""){
        alert("Please enter username!");
        check = false;
    }
    if(password.value == ""){
        alert("Please enter password!");
        check = false;
    }
    if(check == true)
        theForm.submit();
} 
