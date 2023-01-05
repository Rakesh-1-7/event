function login() 
{
    window.location = "../login/login.html";
}

function submitForm() {
    let form = document.getElementById("signup_form");
    if(validatePassword() == true) {
    form.submit();
    }
}
function alphanumeric(uadd)
{ 
    var pattern = /^[A-Za-z][A-Za-z0-9_]*$/;
    if(uadd.match(pattern))
    {
        return true;
    }
    else
    {
        alert('Username must start with alphabet and must have alphanumeric characters and underscores only');
        document.form1.username.focus();
        return false;
    }
}
function validatePassword() {
    const name = document.getElementsByName("name")[0].value;
    const Username = document.getElementsByName("username")[0].value;
    const email = document.getElementsByName("email")[0].value;
    
    
    const Passwd = document.getElementsByName("passwd");
    const PasswdConfirm = document.getElementsByName("confirm_passwd");
    const passwdConds = document.getElementById("passwd_cond");
    passwdConds.innerText = "";
    const minNumberofChars = 6;
    const maxNumberofChars = 16;
    const regularExpression  = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;   
    // const unameExpression = /^[A-Za-z][A-Za-z0-9]*$/;
    // alert(Username);
    if(name == "")
    {
        alert("Name is required");
        return false;
    }
    else if (!name.match(/^[a-zA-Z ]*$/))
    {
        alert("Name must have alphabet characters only");
        return false;
    }
    else if(!alphanumeric(Username)) 
    { 
        alert("Username must start with a letter and can only contain letters , numbers and underscores and must be between 6-16 characters long");
        return false;
    }
        else if(email == "")
    {
        alert("Please enter an email");
        document.form1.email.focus();
        return false;
    }
    else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
    { 
        alert("You have entered an invalid email address!");
        document.form1.email.focus();
        return (false);
    }
    if(Passwd[0].value.length < minNumberofChars || Passwd[0].value.length > maxNumberofChars){
        passwdConds.innerText = "Password must be between 6 and 16 characters";
        return false;
    }
    // console.log(Passwd[0].value);
    var expression = Passwd[0].value;
    if(!regularExpression.test(expression)) {
        passwdConds.innerText  = "Password should contain atleast one number and one special character";
        return false;
    }
    if(Passwd[0].value != PasswdConfirm[0].value) {
        passwdConds.innerText = "Passwords do not match";
        return false;
    }  
    
    return true;
    
}
