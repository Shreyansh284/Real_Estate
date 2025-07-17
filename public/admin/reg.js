function vali() {
    var a = document.getElementById('fname').value;
    if (a == "") {
        alert("Fullname cannot be empty");
        var a1 = false;
    }
    else {
        var aptn = /^[a-zA-Z]$/;
        if (aptn.test(a)) {
            a1 = true;
        }
        else {
            alert("name must contain only alphabets and minimun 3 or maximun 20 char. ");
            a1 = false;
        }
    }
  
 
 
    var b = document.getElementById('uname').value;
 
    if (b == "") {
        alert("User name name cannot be empty");
        var b1 = false;
    }
    else {
        var aptn = /^[a-zA-Z]$/;
        if (aptn.test(b)) {
            b1 = true;
        }
        else {
            alert("name must contain alphabets and number or minimun 5 or maximun 20 char.");
            b1 = false;
        }
    }
  
 
    var c = document.getElementById('email').value;
     if (c == "") {
         alert("Enter the email");
         var c1 = false ;
     }
     else {
         c1 = true;
     }
 
    var d = document.getElementById('number').value;
    var aptn = /^[0-9]{10}$/;
    if(d == ""){
     alert("Enter the number");
     var d1 = false ;
    }
    else {
        if (aptn.test(d)) {
             d1 = true;
        }
        else{
            alert("number is must be 10 num.");
             d1 = false;
        }
    }
 
 
    var e = document.getElementById('pass').value;
    if (e == "") {
        alert("Enter the password");
        var e1 = false;
    }
    else {
 
        if (e.length < 6 || e.length > 15) {
            alert(" Password size is 6 to 14 char. ");
            e1 = false;
         }
         else {
            e1 = true;
        }
 
    }

    var f = document.getElementById('cpass').value;
    if(f == ""){
        alert("Enter the Confirm password")
        var f1 = false
    }
    else{
        if(f != e){
            alert("Password dosen't match");
        }
        else{
            f1 = true;
        }
    }

    
    if(document.getElementById('dot-1').checked) {   
        var g1 = true;
    }   
    else if(document.getElementById('dot-2').checked){
        g1 = true;
    }
    else{
        alert("Select the gender");
        g1 = false;
    }
 
    if (a1 == true && b1 == true && c1 == true && d1 == true && e1 == true && f1 == true && g1 == true) {
        return true;
    }
    else
    {
        return false;
    }
 }