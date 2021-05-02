<?php
    require_once "../../database/functions.php";

    if(isset($_POST['ChangeStatus'])){
        $link = connect();

        $id = $_POST['id'];
        $newStatus = $_POST["Status"];

        if($id != '1'){
            $sql = "UPDATE `users` SET `status` = '$newStatus' WHERE `id` = '$id'";

            mysqli_query($link, $sql);
            mysqli_close($link);
            header('Location: adminpanel.php');
        }else{
            header('Location: adminpanel.php');
        }
    }

    if(isset($_POST['EditPizza'])){
        $link = connect();
        $id = $_POST['id'];
        $Name = $_POST['Name'];
        $Ingredients = $_POST['Ingredients'];
        $Weight = $_POST['Weight'];
        $Price = $_POST['Price'];

        $sql = "UPDATE `pizza` SET `name` = '$Name', `ingredients` = '$Ingredients', `weight` = '$Weight', `price` = '$Price' WHERE `id` = '$id'";
        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: adminpanel.php');
    }
    if(isset($_POST['EditDrinks'])){
        $link = connect();
        $id = $_POST['id'];
        $Name = $_POST['Name'];
        $Price = $_POST['Price'];

        $sql = "UPDATE `drinks` SET `name` = '$Name', `price` = '$Price' WHERE `id` = '$id'";
        echo $sql;
        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: adminpanel.php');
    }

    if(isset($_POST['DeletePizza'])){
        $link = connect();

        $id = $_POST['id'];
        $sql = "DELETE FROM `pizza` WHERE `id` = '$id'";

        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: adminpanel.php');
    }

    if(isset($_POST['DeleteDrinks'])){
        $link = connect();

        $id = $_POST['id'];
        $sql = "DELETE FROM `drinks` WHERE `id` = '$id'";

        mysqli_query($link, $sql);
        mysqli_close($link);
        header('Location: adminpanel.php');
    }

    if(isset($_POST['AddPizza'])){
        $link = connect();

        $name = $_POST['ItemName'];
        $ing = $_POST['ItemIng'];
        $weight= $_POST['ItemWeight'];
        $price = $_POST['ItemPrice'];

        $path = "images/pizza_cards/" . time() . $_FILES['ItemImage']['name'];

        if(move_uploaded_file($_FILES['ItemImage']['tmp_name'], "..\/..\/". $path)){
            $sql = "INSERT INTO `pizza`(`name`, `ingredients`, `weight`, `price`, `image`) 
                VALUES ('$name', '$ing', '$weight', '$price', '$path')";
            mysqli_query($link, $sql);
            mysqli_close($link);
        }

        header('Location: adminpanel.php');
    }

    if(isset($_POST['AddDrink'])){
        $link = connect();

        $name = $_POST['ItemName'];
        $price = $_POST['ItemPrice'];

        $path = "images/drinks/" . time() . $_FILES['ItemImage']['name'];

        if(move_uploaded_file($_FILES['ItemImage']['tmp_name'], "..\/..\/". $path)){
            $sql = "INSERT INTO `drinks`(`name`, `price`, `image`) VALUES ('$name', '$price', '$path')";
            mysqli_query($link, $sql);
            mysqli_close($link);
        }
        header('Location: adminpanel.php');
    }

?>