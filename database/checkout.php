<?php
session_start();
require_once "functions.php";

if(isset($_POST['checkOutSubmit'])){
    $link = connect();

    $id = $_POST['orderId'];

    $sql = "SELECT * FROM `pizzaorders` WHERE `id` = '$id';";
    $result = mysqli_query($link, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        $status     = ($data['completed'] == 1) ? 'Yes' : 'No';
        $cooked     = ($data['cooked'] == 1) 	? 'Yes' : 'No';
        
        $_SESSION['CheckedOutItem'] = [
            "id"        => $data['id'],
            "name"      => $data['name'],
            "phone"     => $data['phone'],
            "sum"       => $data['sum'],
            "order"     => $data['order'],
            "address"   => $data['address'],
            "cooked"    => $cooked,
            "completed"  => $status
        ];
    }else{
        $_SESSION['messageError'] = "Error: Not found";
    }
    
    mysqli_close($link);
    header('Location: ../checkOutOrder.php');
}
?>

