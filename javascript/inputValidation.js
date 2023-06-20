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
}

function checkBookingTime(form) {
    begin = new Date(form.beginDate.value);
    end = new Date(form.endDate.value);

    if(end < Date.now || begin < Date.now) {
        alert ("Error! Please select later date than today");
        return false;
    }

    if(end <= begin) {
        alert ("Error! Please select correct check out date");
        return false;
    }
}