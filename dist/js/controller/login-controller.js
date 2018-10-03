$("#btnLogin").click(loginClicked);
function loginClicked() {
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
        method:"POST",
        url: "api/login.php",
        data:{
            action:"login",
            username: username,
            password: password
        },
        async:false
    }).done(function (response) {
        if(!response){
            alert("Error!  Invalid username or password!");
        }else{
            window.location.replace("index.html");
        }
    })
}