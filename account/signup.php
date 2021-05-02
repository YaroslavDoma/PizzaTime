<?php
    session_start();
    require_once "../database/functions.php";

    $link = connect();

    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $password2 = $_POST['Password2'];
    $name = $_POST['Name'];
    $gender = $_POST['Gender'];
    $phone = $_POST['Phone'];

    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['messageError'] = "Registration error: The email is already registered.";
    }else{
        if($email == "" || $password == "" || $password2 == "" || $name == "" ){
            $_SESSION['messageError'] = "Registration error: Fill up all input boxes.";
        }
        else{
            if($password === $password2){
    
                $password = md5($password);
                $sql = "INSERT INTO `users`(`email`, `password`, `name`, `gender`, `phone`) VALUES ('$email', '$password', '$name', '$gender', '$phone');";
                mysqli_query($link, $sql);
                mysqli_close($link);
        
                $_SESSION['messageSuccess'] = "Success: You registered your account!";
                header('Location: login.php');
        
        
            }else{
                $_SESSION['messageError'] = "Registration error: Passwords don't match";
                header('Location: login.php');
            }
        }
    }
    
    header('Location: login.php');
?>