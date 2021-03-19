<?php
	session_start();
    require_once "database/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment menu - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/payment.css">
	<link rel="icon" href="images/logo.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
	

	<div class="content">
		<div class="orderTable">
			<table class="table" id="table">
			<thead>
				<tr>
					<th scope="col">Image</th>
					<th scope="col">Name</th>
					<th scope="col">Price</th>
					<th scope="col">Count</th>
				</tr>
			</thead>
			<tbody>

			<form method="POST" action="thanks.php">

			<?php
				if(isset($_POST['toPaymentMenu'])){
					$piz = $_POST['pizza'];
					$drinks = $_POST['drinks'];

					if(empty($piz)){
						
					}
					else{
						$count = 0;
						foreach($piz as $item){
							$count++;
							$result = FindPizza($item);
							?>
								<tr>
									<th><img class="table-img" src="<?php echo $result['image']?>"></th>
									<td><input class="tableInput" type="text" value="<?php echo $result['name']?>" readonly name="pizza[]"/></td>
									<td><?php echo $result['price']?>&#8372;</td>
									<td><input class="tableInput numberInput" type="number" min="1" max="5" value="1" name = "pizzaCount[]" onchange="PriceForPizza()" <?php echo "id='count-$count'" ?> /></td>
								</tr>

							<?php
						}
						if(count($drinks) > 0){
							foreach($drinks as $item){
								$count++;
								$result = FindDrink($item);
								?>

									<tr>
										<th><img class="table-img" src="<?php echo $result['image']?>"></th>
										<td><input class="tableInput" type="text" value="<?php echo $result['name']?>" readonly 	name="drink[]"/></td>
										<td><?php echo $result['price']?>&#8372;</td>
										<td><input class="tableInput numberInput" type="number" min="1" max="5" value="1" 	name = "drinkCount[]" onchange="PriceForPizza()" <?php echo "id='count-$count'" ?>/></td>
									</tr>

								<?php
							}
						}
					}
				}
			?>
			</tbody>
			</table>
		</div>	
	</div>

	<h3 class="PriceText" id="PriceText">Total price: 0&#8372;</h3>

	<div class="tabs">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active firsttab" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery" aria-selected="true">Delivery</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="yourself-tab" data-toggle="tab" href="#yourself" role="tab" aria-controls="yourself" aria-selected="false">Yourself</a>
		</li>
		</ul>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
				<div class="DeliveryDiv">
					<h5 style="margin-top: 15px;">Delivery costs 50&#8372;. Deliveryman will call you when he come.</h5>
					<div class="form-group">
						<label for="formGroupExampleInput">Name</label>
						<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" value="<?php if($_SESSION['user']) echo $_SESSION['user']['name'] ?>" name="ordersname">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Address</label>
						<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address" name="address">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Phone</label>
						<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone number" value="<?php if($_SESSION['user']) echo $_SESSION['user']['phone'] ?>" name="phonenumber">
					</div>
					<div class="form-group">
						<?php if(empty($piz)) {
							echo '<input type="submit" class="form-control sendbtndis" id="formGroupExampleInput2" value="Send order" disabled>';
						}else{
							echo '<input type="submit" class="form-control sendbtn" id="formGroupExampleInput2" value="Send order" name="soDelivery">';
						}
						?>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="yourself" role="tabpanel" aria-labelledby="yourself-tab">
				<div class="YourselfDiv">
					<h5 style="margin-top: 15px;">You can take your pizza in 20-30 minutes at Kyiv, st. Leo Tolstoy, 1a</h5>
					<div class="form-group">
						<label for="formGroupExampleInput">Name</label>
						<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" value="<?php if($_SESSION['user']) echo $_SESSION['user']['name'] ?>" name="ordersName">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Phone</label>
						<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone number" value="<?php if($_SESSION['user']) echo $_SESSION['user']['phone'] ?>" name="phoneNumber">
					</div>
					<div class="form-group">
					<?php if(empty($piz)) {
							echo '<input type="submit" class="form-control sendbtndis" id="formGroupExampleInput2" value="Send order" disabled>';
						}else{
							echo '<input type="submit" class="form-control sendbtn" id="formGroupExampleInput2" value="Send order" name="soYourself">';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	</form>

	<script src="main.js" onload="PriceForPizza()"></script>
			
			
</body>
</html>