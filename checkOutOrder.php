<?php
    session_start();
    require_once "database/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>About - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/about.css">
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
			<li class="nav-item">
			  <a class="nav-link" href="about.php">About</a>
			</li>
			<li class="nav-item active">
			  <a class="nav-link" href="checkOutOrder.php">Check order out</a>
			</li>
			<li class="nav-item">
				<a href="account/login.php">
					<button type="button" class="btn btn-light" >Log In</button>
				</a>
			</li>
		  </ul>
		</div>
	</nav>

	<div class="CheckOut">
		<form action="database/checkout.php" method="POST">
			<h4>
				Enter order id: 
				<input type="text" placeholder="Order id" name="orderId">
				<input type="submit" name="checkOutSubmit" value="Find">
			</h4>
		</form>
		<table class="table table-hover table-sm">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">Sum</th>
					<th scope="col">Order</th>
					<th scope="col">Address</th>
					<th scope="col">Cooked</th>
					<th scope="col">Completed</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($_SESSION['CheckedOutItem']){
						echo "<tr>";

						echo "<th>". $_SESSION['CheckedOutItem']['id'] . "</th>";
						echo "<td>". $_SESSION['CheckedOutItem']['name'] . "</td>";
						echo "<td>". $_SESSION['CheckedOutItem']['phone'] . "</td>";
						echo "<td>". $_SESSION['CheckedOutItem']['sum'] . "</td>";
						echo "<td>". $_SESSION['CheckedOutItem']['order']. "</td>";
						echo "<td>". $_SESSION['CheckedOutItem']['address']. "</td>";
						echo "<td>". $_SESSION['CheckedOutItem']['cooked']. "</td>";
						echo "<td>". $_SESSION['CheckedOutItem']['completed']. "</td>";

						echo "</tr>";
						unset( $_SESSION['CheckedOutItem'] );
					}
				?>
			</tbody>
		</table>
		
		<?php
			if($_SESSION['messageError']){
				echo '<div class="messageError">' . $_SESSION['messageError'] . '</div>';
				unset($_SESSION['messageError']);
			}
		?> 
    </div>




</body>
</html>