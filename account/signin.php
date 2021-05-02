<?php
    session_start();
    require_once "../database/functions.php";
    $link = connect();
    $email = $_POST['Email'];
    $password = md5($_POST['Password']);

    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $check = mysqli_query($link, $sql);

    if(mysqli_num_rows($check) > 0){
        $user = mysqli_fetch_assoc($check);
        
        $_SESSION['user'] = [
            "id"  => $user['id'],
            "name"  => $user['name'],
            "email" => $user['email'],
            "gender" => $user["gender"],
            "phone" => $user['phone'],
            "status" => $user['status']
        ];

        header('Location: profile.php');
    }else{
        $_SESSION['messageError'] = "Log in error: Wrong password or email";
        header('Location: login.php');
    }
?>