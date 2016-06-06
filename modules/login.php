<?php
session_start();

include '../classes/Connection.class.php';

if(isset($_POST['login']))
{
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $dbh = Connection::getInstance()->connect();

    $check_user= $dbh->prepare("SELECT 1 FROM users WHERE username='$username'AND password='$password'");
    $check_user->execute();

    $run = $check_user->fetch();

    if($run)
    {
        header("Location: ../db.php");

        $_SESSION['username']=$username;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {

        echo "<script>alert('Username or password is incorrect!')</script>";
        echo "<script>window.open('../enter.php','_self')</script>";
    }
}
?>