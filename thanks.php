<?php
    require_once "database/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>About - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="7;Index.php" />
	<link rel="stylesheet" type="text/css" href="css/about.css">
	<link rel="icon" href="images/logo.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="Index.php">
			  <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			  PizzaTime
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
		  </nav>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
			  <a class="nav-link" href="Index.php">Home</a>
			</li>
			<li class="nav-item active">
			  <a class="nav-link" href="about.php">About</a>
			</li>
			<li class="nav-item">
				<a href="account/login.php">
					<button type="button" class="btn btn-light" >Log In</button>
				</a>
			</li>
		  </ul>
		</div>
		

	</nav>

	<div class="information">
		<div class="card mb-3">
			<img class="card-img-top" src="images/about.jpg" alt="Card image cap">
			<div class="card-body">
				<h2 class="card-title">Thank you!</h2>
				<h4 class="card-text"> <img src="images/logo.png" style="height: 30px;"> Thanks for your order. We are gonna make your food. </h4>
			</div>
		</div>
	</div>

	
	<?php
		if(isset($_POST['soYourself'])){
			$pizza 			= $_POST['pizza'];
			$pizzaCount 	= $_POST['pizzaCount'];
			$drink		 	= $_POST['drink'];
			$drinkCount 	= $_POST['drinkCount'];
			$name 			= $_POST['ordersName'];
			$phone 			= $_POST['phoneNumber'];

			$fullorder = "";
			$price = 0;

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

			$sql = "INSERT INTO `pizzaorders`(`name`, `phone`, `sum`, `order`) VALUES ('$name', '$phone', '$price', '$fullorder');";
            SqlCommand($sql);
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

			$sql = "INSERT INTO `pizzaorders`(`name`, `phone`, `sum`, `order`, `address`, `delivery`) VALUES ('$name', '$phone', '$price', '$fullorder', '$address', '1');";
            SqlCommand($sql);
		}
	?>

		
	
	<script>
		// CAN'T SEND FORM AFTER RELOADING PAGE
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>

</body>
</html>