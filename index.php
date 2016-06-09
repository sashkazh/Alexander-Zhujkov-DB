<html>
    <head>
        <title>Sign Up</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/validation.js"></script>
    </head>

    <body>

    <div class="container" id="c">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div accept-charset="utf-8" class="form" role="form">
                    <div class="us">
                        <input type="text" id="username" class="form-control input-lg" placeholder="Username"  />
                    </div>
                    <div class="em">
                        <input type="text" id="email" class="form-control input-lg has-error" placeholder="Your Email"  />
                    </div>
                    <div class="pa">
                        <input type="password" id="password" class="form-control input-lg" placeholder="Password"  />
                    </div>
                    <div class="re">
                        <input type="password" id="repassword" class="form-control input-lg" placeholder="Confirm Password"  />
                    </div>
                    <div class="row">
                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" id="submitbtn">Create my account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>