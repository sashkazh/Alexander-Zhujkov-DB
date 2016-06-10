<?php
class User
{
    public static function login()
    {
        session_start();
        $dbh = Connection::getInstance()->connect();

        if (isset($_POST['username']) && ($_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $stmt = $dbh->prepare("SELECT 1 FROM users WHERE username='$username'AND password='$password'");
            $stmt->execute();

            $stmt = $stmt->fetch();

            if ($stmt) {
                echo "ok";
                $_SESSION['username'] = $username;
            } else {
                echo "username or password does not exist.";
            }
        }
    }

    public static function signup()
    {

        $dbh = Connection::getInstance()->connect();

        if (isset($_POST['email']) && !isset($_POST['username'])) {

            $email = $_POST['email'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                echo "invalid";

            } else {

                $stmt = $dbh->prepare("SELECT id FROM users WHERE email=:email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $stmt = $stmt->fetch();

                if ($stmt) {

                    echo "exist";

                } else {

                    echo "ok";
                }
            }
        }

        if (isset($_POST['username']) &&
            isset($_POST['email']) &&
            isset($_POST['password'])
        ) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $date = date("F, d Y");

            $stmt = $dbh->prepare("INSERT INTO users (username, email, password, date)
            VALUES (:username, :email, :password, :date)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', md5($password));
            $stmt->bindParam(':date', $date);
            $stmt->execute();
        }
    }
}