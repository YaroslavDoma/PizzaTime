<?php
	session_start();
    require_once "../../database/functions.php";

	if(!$_SESSION['user']){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orders - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/profile.css">
	<link rel="icon" href="../../images/logo.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="../../Index.php">
			  	<img src="../../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				PizzaTime
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item first">
				<a class="nav-link" href="../profile.php">Profile</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="orders.php">Active Orders</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="delivery.php">Active delivery</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="adminpanel.php">Admin Panel</a>
			</li>

			<li class="nav-item logOutButton">
				<a href="../signout.php">
					<button type="button" class="btn btn-light">
						Log Out
					</button>
				</a>
			</li>
		  </ul>
		</div>
	</nav>



	<?php
	if($_SESSION['user']['status'] == "Cook" or $_SESSION['user']['status'] == "Admin"){ ?>
		<div class="main">
			<div class="ordersTable">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Name</th>
							<th scope="col">Order</th>
							<th scope="col">Sum</th>
							<th scope="col">Delivery</th>
							<th scope="col">Complete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$data = GetUncompletedOrders();
							if(count($data) != 0){
								foreach($data as $item){
									if($item['delivery'] == "1") $delivery = "Yes"; 
									else  $delivery = "No"; 
									
									echo "<tr>";
										echo "<th>". $item['id'] . "</th>";
										echo "<td>". $item['name'] . "</td>";
										echo "<td>". $item['order'] . "</td>";
										echo "<td>". $item['sum'] . "</td>";
										echo "<td>". $delivery . "</td>";
										?>
										<td> 
											<form method="POST" action="completeOrder.php">
												<input type="hidden" value="<?php echo $item['id'] ?>" name="id">
												<input type="hidden" value="<?php echo $item['delivery'] ?>" name="delivery">
												<button class="btn btn-dark Complete" type="submit" name="Cook">Complete</button> 
											</form>
										</td>
									</tr>
								<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}else{
	?>
		<div class="main">
			<div class="content">
				<p>You don't have permissions to see this page.</p>
			</div>
		</div>
	<?php
	}
	?>
	
	
	

	
</body>
</html>