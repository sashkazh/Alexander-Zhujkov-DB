<?php
session_start();

if(!$_SESSION['username'])
{
    header("Location: enter.php");
}

?>
<html>
<head>
    <title>DB</title>
    <meta name="author" content="Alexander Zhujkov">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/s_f.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        
        <a href="/modules/logout.php" class="btn btn-danger navbar-btn btn-lg pull-right" role="button">Logout</a>

        <div class="page-header" align="center">
            <h1>Database</h1>
        </div>



