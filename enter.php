<html>
<head>
    <title>Enter</title>
    <meta name="author" content="Alexander Zhujkov">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">


    <form class="form-signin" method="post" action="modules/login.php">
        <input type="username" name="user" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <button class="btn btn-success btn-block" type="submit" name="login" style="font-size:large;">Sign in</button>
        <a href="index.php" class="btn btn-primary btn-block" role="button" style="font-size:large;">Sign up</a>
    </form>

</div>

</body>
</html>