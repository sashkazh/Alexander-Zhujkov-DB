<?php
session_start();

include '../classes/Connection.class.php';

if(isset($_POST['login']))
{
    $username=$_POST['user'];
    $password=md5($_POST['pass']);

    $dbh = Connection::getInstance()->connect();

    $stmt= $dbh->prepare("SELECT 1 FROM users WHERE username='$username'AND password='$password'");
    $stmt->execute();

    $stmt = $stmt->fetch();

    if($stmt)
    {
        header("Location: ../db.php");

        $_SESSION['username']=$username;

    }
    else
    {

        echo "<script>alert('Username or password is incorrect!')</script>";
        echo "<script>window.open('../enter.php','_self')</script>";
    }
}
?>