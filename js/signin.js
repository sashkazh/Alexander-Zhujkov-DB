$(function() {
    $("#submitbtn").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        var dataString = 'username=' + username + '&password=' + password;
        if ($.trim(username).length > 0 && $.trim(password).length > 0) {
            $.ajax({
                type: "POST",
                url: "modules/login.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    if (data) {
                        window.location.href = "db.php";
                    }
                }
            });
        }
    });
});