<?php
session_start();
require_once "database/functions.php";

if(isset($_POST['soYourself'])){
    $pizza 			= $_POST['pizza'];
    $pizzaCount 	= $_POST['pizzaCount'];
    $drink		 	= $_POST['drink'];
    $drinkCount 	= $_POST['drinkCount'];
    $name 			= $_POST['ordersName'];
    $phone 			= $_POST['phoneNumber'];
    $fullorder = "";
    $price = 0;


    if(strlen($phone) < 8){
        $_SESSION['messageError'] = "Not correct phone number.";
    }else{
        $i = 0;
        foreach($pizza as $item){
            $result = FindPizza($item);
    
            $fullorder = "{$fullorder}{$result['name']}*{$pizzaCount[$i]}, ";
            $price += (int)$result['price'] * (int)$pizzaCount[$i];
            $i++;
        }
    
        if(count($drink) > 0){
            $i = 0;
            foreach($drink as $item){
                $result = FindDrink($item);
    
                $fullorder = "{$fullorder}{$result['name']}*{$drinkCount[$i]}, ";
                $price += (int)$result['price'] * (int)$drinkCount[$i];
                $i++;
            }
        }
    
        if($_SESSION['user']){
            $clientId = $_SESSION['user']['id'];
            $sql = "INSERT INTO `pizzaorders`(`name`, `phone`, `sum`, `order`, `clientId`) VALUES ('$name', '$phone', '$price', '$fullorder', '$clientId');";
        }else{
            $sql = "INSERT INTO `pizzaorders`(`name`, `phone`, `sum`, `order`) VALUES ('$name', '$phone', '$price', '$fullorder');";
        }
    
        $result = MakeOrder($sql);
        $_SESSION['LastOrder'] = $result;
        header('Location: thanks.php');
    }
}

if(isset($_POST['soDelivery'])){
    $pizza 			= $_POST['pizza'];
    $pizzaCount 	= $_POST['pizzaCount'];
    $drink		 	= $_POST['drink'];
    $drinkCount 	= $_POST['drinkCount'];
    $name 			= $_POST['ordersname'];
    $phone 			= $_POST['phonenumber'];
    $address 		= $_POST['address'];

    $fullorder = "";
    $price = 50;


    if(strlen($phone) < 8){
        $_SESSION['messageError'] = "Not correct phone number.";
        header('Location: paymentmenu.php');
    }

    if(strlen($address) < 8){
        $_SESSION['messageError'] = "Address is short";
        header('Location: paymentmenu.php');
    }


    $i = 0;
    foreach($pizza as $item){
        $result = FindPizza($item);

        $fullorder = "{$fullorder}{$result['name']}*{$pizzaCount[$i]}, ";
        $price += (int)$result['price'] * (int)$pizzaCount[$i];
        $i++;
    }

    if(count($drink) > 0){
        $i = 0;
        foreach($drink as $item){
            $result = FindDrink($item);

            $fullorder = "{$fullorder}{$result['name']}*{$drinkCount[$i]}, ";
            $price += (int)$result['price'] * (int)$drinkCount[$i];
            $i++;
        }
    }

    if($_SESSION['user']){
        $clientId = $_SESSION['user']['id'];
        $sql = "INSERT INTO `pizzaorders`(`name`, `phone`, `sum`, `order`, `address`, `delivery`, `clientId`) VALUES ('$name', '$phone', '$price', '$fullorder', '$address', '1', '$clientId');";
    }else{
        $sql = "INSERT INTO `pizzaorders`(`name`, `phone`, `sum`, `order`, `address`, `delivery`) VALUES ('$name', '$phone', '$price', '$fullorder', '$address', '1');";
    }

    $result = MakeOrder($sql);
    $_SESSION['LastOrder'] = $result;
    header('Location: thanks.php');
}








header('Location: paymentmenu.php');
?>