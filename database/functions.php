<?php 

function connect(){
    $link = mysqli_connect('localhost','root','root','timetopizza');
    
    if(mysqli_connect_errno() ){
        echo 'Connection error ('.mysqli_connect_errno().'): '.mysqli_connect_error();
        exit();
    }
    return $link;
}


function get_pizza(){
    $link = connect();

    $sql = "SELECT * FROM `pizza`";
    $result = mysqli_query($link, $sql); 
    $data = mysqli_fetch_all($result, 1);

    mysqli_close($link);
    return $data;
}

function get_drinks(){
    $link = connect();

    $sql = "SELECT * FROM `drinks`";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);

    mysqli_close($link);
    return $data;
}


function FindPizza($name){
    $link = connect();
    $sql = "SELECT * FROM `pizza` WHERE `name` = '$name'";
    $result = mysqli_query($link, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        mysqli_close($link);
        return $data;
    }
}

function FindDrink($name){
    $link = connect();

    $sql = "SELECT * FROM `drinks` WHERE `name` = '$name'";
    $result = mysqli_query($link, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        mysqli_close($link);
        return $data;
    }
}

function SqlCommand($sql){
    $link = connect();
    mysqli_query($link, $sql);
    mysqli_close($link);
}


function MakeOrder($sql){
    $link = connect();
    mysqli_query($link, $sql);
    $id = mysqli_insert_id($link);
    mysqli_close($link);
    return $id;
}


function GetUncompletedOrders(){
    $link = connect();
    $sql = "SELECT * FROM `pizzaorders` WHERE `cooked` = '0'";
    
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);
    
    mysqli_close($link);
    return $data;
}

function GetDelivery(){
    $link = connect();
    $sql = "SELECT * FROM `pizzaorders` WHERE `cooked` = '1' AND `delivery` = '1' AND `completed` = '0'";
    
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);
    
    mysqli_close($link);
    return $data;
}


function GetUsers(){
    $link = connect();
    $sql = "SELECT * FROM `users`";
    
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);
    
    mysqli_close($link);
    return $data;
}

function GetAllOrders(){
    $link = connect();
    $sql = "SELECT * FROM `pizzaorders`";
    
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);
    
    mysqli_close($link);
    return $data;
}


function GetMyOrders(){
    $link = connect();
    $clientId = $_SESSION['user']['id'];

    $sql = "SELECT * FROM `pizzaorders` WHERE `clientId` = '$clientId';";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, 1);

    mysqli_close($link);
    return $data;
}


?>
