<?php
    $user = "root";
    $pass = "";
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=signup', $user, $pass);
        $dbh->exec("SET CHARACTER SET utf8");
        $dbh->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    }

    if(isset($_POST['email']) && !isset($_POST['username'])) {

        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            echo "invalid";

        } else {

            $stmt = $dbh->prepare("SELECT id FROM users WHERE email=:email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $stmt = $stmt->fetch();

            if($stmt){

                echo "exist";

            } else{

                echo "ok";
            }
        }
    }

    if( isset($_POST['username'])&&
        isset($_POST['email'])&&
        isset($_POST['password'])
    ){
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
