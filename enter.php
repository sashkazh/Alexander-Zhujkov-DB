<?php
session_start();
if(!empty($_SESSION['username']))
{
    header('Location: db.php');
}
?>
<html>
<head>
    <title>Enter</title>
    <meta name="author" content="Alexander Zhujkov">
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/signin.js"></script>
</head>
<body>

<div class="container">

    <form class="form-signin">
        <input type="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-success btn-block" type="submit" id="submitbtn">Sign in</button>
        <a href="index.php" class="btn btn-primary btn-block" role="button">Sign up</a>
    </form>

</div>

</body>
</html>