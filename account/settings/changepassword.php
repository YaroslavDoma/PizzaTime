<?php
    session_start();
    require_once "../../database/functions.php";
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

?>