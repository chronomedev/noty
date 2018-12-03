//Redirect Script
//www group 2018

function githubRedirect(){
    window.location.assign("https://github.com/hansrenee");
}

function kirimEmail(){
    window.open('mailto:hansrenee@live.com');
}

function signIn(){
    window.location.assign("login.html");
}


function isiForm(){
    window.location.assign("form.html");
}


function userLogin(){
    var form = document.getElementById("form_login");
    var ambilpw = document.getElementById("exampleInputPassword1").value;
    console.log(ambilpw);
    document.getElementById("exampleInputPassword1").value= chiper(ambilpw);
    console.log(chiper(ambilpw));
    form.submit();
}
