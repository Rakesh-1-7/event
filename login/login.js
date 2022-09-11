function login() 
{
    window.location = "../signup/signup.html";
}

function submitForm() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const form = document.getElementById("login_form");
    var c = 0;
    data = new FormData(form);
    // console.log(data.values());
    if(username == "")
        alert("Please enter your username");
    else if(password == "")
        alert("Please enter your password");
        data.forEach(element => {
        if(element == "")
        c += 1;
    });
    
    if(c == 0)
    form.submit();
    
    
}
