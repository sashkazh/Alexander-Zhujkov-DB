<html>
<head>
    <title>Enter page</title>
    <meta name="author" content="Alexander Zhujkov">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <form class="form-signin" method="post" action="modules/login.php">
        <input type="username" name="user" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <button class="btn btn-primary btn-block" type="submit" name="login">Sign in</button>
    </form>

</div>

</body>
</html>