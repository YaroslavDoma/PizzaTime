<?php
    session_start();
    require_once "../../database/functions.php";
    $link = connect();

    if(isset($_POST['Cook'])){
        $id = $_POST['id'];
        $del = $_POST['delivery'];

        if($del == 1){
            $sql = "UPDATE `pizzaorders` SET `cooked`= '1' WHERE `id` = '$id'";
        }else{
            $sql = "UPDATE `pizzaorders` SET `cooked`= '1', `completed` = '1' WHERE `id` = '$id'";
        }

        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: orders.php');
    }

    
    if(isset($_POST['Delivery'])){
        $id = $_POST['id'];
        $sql = "UPDATE `pizzaorders` SET `completed` = '1' WHERE `id` = '$id'";

        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: delivery.php');
    }
?>

