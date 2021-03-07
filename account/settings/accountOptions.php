<?php
    session_start();
    require_once "../../database/functions.php";

    if(isset($_POST['ChangePassword'])){
        $link = connect();

        $password = md5($_POST['OldPassword']);
        $newPassword1 = $_POST['NewPassword1'];
        $newPassword2 = $_POST['NewPassword2'];

        $email = $_SESSION['user']['email'];

        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
            $id = $data['id'];

            $newPassword = md5($newPassword1);

            if($newPassword1 === $newPassword2){
                $sql = "UPDATE `users` SET `password`= '$newPassword' WHERE `id` = '$id'";
                mysqli_query($link, $sql);
                $_SESSION['messageSuccess'] = "Success: <br> You changed your password!";
                header('Location: ../profile.php');
            }else{
                $_SESSION['messageError'] = "Error: <br> Passwords don't match";
                header('Location: ../profile.php');
            }
        }else{
            $_SESSION['messageError'] = "Error: <br> Wrong old password";
            header('Location: ../profile.php');
        }
    }

    if(isset($_POST['ChangeName'])){
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
    }

    if(isset($_POST['ChangePhone'])){
        $link = connect();

        $newPhone = $_POST['NewPhone'];
        $password = md5($_POST['Password']);

        $email = $_SESSION['user']['email'];
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
            $id = $data['id'];

            $sql = "UPDATE `users` SET `phone` = '$newPhone' WHERE `id` = '$id'";
            mysqli_query($link, $sql);

            $_SESSION['messageSuccess'] = "Success: You changed phofile phone number!";
            $_SESSION['user']['phone'] = $newPhone;
            header('Location: ../profile.php');
        }else{
            $_SESSION['messageError'] = "Error: Wrong password";
            header('Location: ../profile.php');
        }
    }



?>