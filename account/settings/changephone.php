<?php
    session_start();
    require_once "../../database/functions.php";
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

    
?>