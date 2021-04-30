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
	<title>Delivery - PizzaTime</title>
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

			<?php
				if($_SESSION['user']['status'] != "Client"){
			?>
				<li class="nav-item">
					<a class="nav-link" href="orders.php">Active Orders</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="delivery.php">Active delivery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="adminpanel.php">Admin Panel</a>
				</li>
                <li class="nav-item active">
					<a class="nav-link" href="myorders.php">My orders</a>
				</li>
			<?php
				}
				else{
			?>
				<li class="nav-item active">
					<a class="nav-link" href="myorders.php">My orders</a>
				</li>
			<?php
				}
			?>

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



    <div class="main">
        <div class="ordersTable">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Sum</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Delivery</th>
                        <th scope="col">Cooked</th>
                        <th scope="col">Completed</th>
						<th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = GetMyOrders();
						if(count($data) == 0){
							echo "You don't have any orders";
						}else{
                            foreach($data as $item){
                                echo "<tr>";

                                $status     = ($item['completed'] == 1) ? 'Yes' : 'No';
                                $cooked     = ($item['cooked'] == 1) ? 'Yes' : 'No';
                                $delivery   = ($item['delivery'] == 1) ? 'Yes' : 'No';

                                echo "<td>" . $item['id'] . "</td>";
                                echo "<td>" . $item['name'] . "</td>";
                                echo "<td>" . $item['address'] . "</td>";
                                echo "<td>" . $item['sum'] . "</td>";
                                echo "<td>" . $item['phone'] . "</td>";
                                echo "<td>" . $delivery . "</td>";
                                echo "<td>" . $cooked . "</td>";
                                echo "<td>" . $status . "</td>";
								echo "<td>" . $item['date'] . "</td>";

                                echo "<tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
	
	
	

	
</body>
</html>