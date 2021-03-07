<?php
    session_start();
    require_once "../../database/functions.php";
    $link = connect();

    $newName = $_POST['NewName'];
    $password = md5($_POST['Password']);

    $email = $_SESSION['user']['email'];
    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        $id = $data['id'];

        if($newPassword1 === $newPassword2){
            $sql = "UPDATE `users` SET `name`= '$newName' WHERE `id` = '$id'";
            mysqli_query($link, $sql);
            $_SESSION['messageSuccess'] = "Success: You changed profile name!";
            $_SESSION['user']['name'] = $newName;
            header('Location: ../profile.php');
        }else{
            $_SESSION['messageError'] = "Error: Passwords don't match";
            header('Location: ../profile.php');
        }
    }else{
        $_SESSION['messageError'] = "Error: Wrong password";
        header('Location: ../profile.php');
    }

    
?>