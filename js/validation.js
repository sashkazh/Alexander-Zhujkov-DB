$(function(){

    var username = "";
    var email = "";
    var password = "";
    var repassword = "";

    $("#username").keyup(function () {
        var vall = $(this).val();
        if(vall == ""){
            $(".us").removeClass( "has-success" ).addClass("has-error");
            username = "";
        } else {
            $(".us").removeClass( "has-error" ).addClass("has-success");
            username = vall;
        }
    });

    $("#email").keyup(function () {
        var vall = $(this).val();
        if(vall == ""){
            $(".em").removeClass( "has-success" ).addClass("has-error");
            email = "";
        } else {
            $.ajax({
                type: 'POST',
                url: '../modules/signup.php',
                data: "email="+vall,
                success: function (msg){
                    if(msg == "invalid") {
                        $(".em").removeClass( "has-success" ).addClass("has-error");
                        email = "";

                    } else if(msg == "exist"){
                        $(".em").removeClass( "has-success" ).addClass("has-error");
                        email = "";

                    } else if(msg == "ok"){
                        $(".em").removeClass( "has-error" ).addClass("has-success");
                        email = vall;
                    }
                }
            });
        }
    });

    $("#password").keyup(function () {
        var vall = $(this).val();
        if(vall == ""){
            $(".pa").removeClass( "has-success" ).addClass("has-error");
            password = "";
        } else if(vall.length < 5){
            $(".pa").removeClass( "has-success" ).addClass("has-error");
            password = "";
        } else {
            $(".pa").removeClass( "has-error" ).addClass("has-success");
            password = vall;
        }
    });

    $("#repassword").keyup(function () {
        var vall = $(this).val();
        if(vall == ""){
            $(".re").removeClass( "has-success" ).addClass("has-error");
            repassword = "";
        } else if(password !== vall){
            $(".re").removeClass( "has-success" ).addClass("has-error");
            repassword = "";
        } else {
            $(".re").removeClass( "has-error" ).addClass("has-success");
            repassword = vall;
        }
    });
    
    $("#submitbtn").click(function() {
        if(username == "" || email == "" || password == "" || repassword == ""){
        } else {
            $.ajax({

                type: 'POST',
                url: '../modules/signup.php',
                data: "username="+username+"&email="+email+"&password="+password,
                success: function(html){
                    alert("You signed up!");
                    var url = "../enter.php";
                    $(location).attr('href',url);
                }
            });
        }
    });
});
