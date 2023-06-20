function checkPassword(form) {
    password = form.password.value;
    confirmpass = form.confirmpass.value;

    if (password == '')
        alert ("Please enter Password");
          
    else if (confirmpass == '')
        alert ("Please enter confirm password");
          
    else if (password != confirmpass) {
        alert ("\nPassword did not match: Sign up is not successfull")
        return false;
    }

    else{
        alert("Sign up successfull")
        return true;
    }
}