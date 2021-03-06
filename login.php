<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-PAPERWORK (LOGIN)</title>
    <link rel="stylesheet" type="text/css" href="auth_vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="auth_vendor/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="auth_vendor/css/iofrm-theme17.css">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <!-- <img class="logo-size" src="logo.png" alt=""> -->
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <!-- <img src="logo.png" alt=""> -->
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        <form action="auth/auth.php" method="post" id="formlogin">
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="button" class="ibtn">Login</button>
                            </div>
                            <small id="message" style="color:red"></small>
                        </form>
                        <div class="other-links">
                            <!-- <div class="text">Or login with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a> -->
                        </div>
                        <div class="page-links">
                            <a href="register.php">Register new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="auth_vendor/js/jquery.min.js"></script>
<script src="auth_vendor/js/popper.min.js"></script>
<script src="auth_vendor/js/bootstrap.min.js"></script>
<script src="auth_vendor/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
<script>
$(function(){

    var form = $("#formlogin");
    form.validate();

    $("#submit").on("click", function(){

        if (form.valid()) {

            $.ajax({
                url: $("#formlogin").attr("action"),
                method: $("#formlogin").attr("method"),
                dataType: "text",
                data: $("#formlogin").serialize() + "&function=login",
                success: function (data){

                    console.log(data);
                    if (data == "Password is valid!") {
                        window.location.replace("http://localhost/editor/home.php");
                    } else {
                        $("#message").html(data);
                        form[0].reset();
                    }

                }
            });

        }

    });

});
</script>
</body>
</html>