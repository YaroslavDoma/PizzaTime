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
			<li class="nav-item">
				<a class="nav-link" href="orders.php">Active Orders</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="delivery.php">Active delivery</a>
			</li>
			<li class="nav-item active">
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
	if($_SESSION['user']['status'] == "Admin"){ ?>
		<div class="main">
			<div class="adminPanel">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab" aria-controls="pills-users" aria-selected="true">All users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-orders-tab" data-toggle="pill" href="#pills-orders" role="tab" aria-controls="pills-orders" aria-selected="false">All orders</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-menu-tab" data-toggle="pill" href="#pills-menu" role="tab" aria-controls="pills-menu" aria-selected="false">Edit pizza menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-drinks-tab" data-toggle="pill" href="#pills-drinks" role="tab" aria-controls="pills-drinks" aria-selected="false">Edit drinks menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-add-tab" data-toggle="pill" href="#pills-add" role="tab" aria-controls="pills-add" aria-selected="false">Add new item</a>
				</li>
				
			</ul>
				
			<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
						<table class="table">
							<thead>
								<tr>
								<th scope="col">Id</th>
									<th scope="col">Email</th>
									<th scope="col">Name</th>
									<th scope="col">Phone</th>
									<th scope="col">Status</th>
									<th scope="col">Option</th>
									<th scope="col">Submit</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$data = GetUsers();
									if(count($data) != 0){
										foreach($data as $item){									
											echo "<tr>";
												echo "<th>". $item['id'] . "</th>";
												echo "<td>". $item['email'] . "</td>";
												echo "<td>". $item['name'] . "</td>";
												echo "<td>". $item['phone'] . "</td>";
												echo "<td>". $item['status'] . "</td>";
												?>
												<form method="POST" action="options.php">
													<td> 
														<select id="Status" class="form-control" name="Status">
															<option selected disabled>Change status</option>
															<option>Admin</option>
															<option>Cook</option>
															<option>Deliveryman</option>
															<option>Client</option>
														</select>
													</td>
													<td>
														<input type="hidden" value="<?php echo $item['id'] ?>" name="id">
														<?php
															if($item['id'] != '1'){
																echo "<button class='btn btn-dark Complete' type='submit' name='ChangeStatus'>Complete</button>";
															}else{
																echo "<button class='btn btn-dark Complete' type='submit' name='ChangeStatus' disabled>Complete</button>";
															}
														
														?>
														 
													</td>
												</form>
											</tr>
										<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>

					<div class="tab-pane fade" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab">
						<table class="table">
							<thead>
								<tr>
								<th scope="col">Id</th>
									<th scope="col">Name</th>
									<th scope="col">Phone</th>
									<th scope="col">Sum</th>
									<th scope="col">Order</th>
									<th scope="col">Completed</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$data = GetAllOrders();
									if(count($data) != 0){
										foreach($data as $item){	
											if($item['completed'] == "1") $com = "Yes";
											else $com = "No";

											echo "<tr>";
												echo "<th>". $item['id'] . "</th>";
												echo "<td>". $item['name'] . "</td>";
												echo "<td>". $item['phone'] . "</td>";
												echo "<td>". $item['sum'] . "</td>";
												echo "<td>". $item['order'] . "</td>";
												echo "<td>". $com . "</td>";
												?>
												
											</tr>
										<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>

					<div class="tab-pane fade" id="pills-menu" role="tabpanel" aria-labelledby="pills-menu-tab">
						<div class="TableContent">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Image</th>
										<th scope="col">Name</th>
										<th scope="col">Ingredients</th>
										<th scope="col">Weight g</th>
										<th scope="col">Price &#8372;</th>
										<th scope="col">Options</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$data = get_pizza();
										if(count($data) != 0){
											foreach($data as $item){
												$path = "../../" . $item['image'];
												?>
												<tr>
													<form action="options.php" method="POST">
														<th> <?php echo $item['id'] ?> </th>
														<td> <img class='tableimg' src='<?php echo $path ?>'> </td>
														<td> <input type="text" value="<?php echo $item['name'] ?>" 	name="Name"> </td>
														<td> <textarea name="Ingredients"><?php echo $item['ingredients'] ?> </textarea> </td>
														<td> <input type="text" value="<?php echo $item['weight'] ?>" 	name="Weight"> </td>
														<td> <input type="text" value="<?php echo $item['price'] ?>" 	name="Price"> </td>
														<td>
															<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
															<button type="submit" name="EditPizza" class="btn btn-dark">Edit</button>
															<button type="submit" class="btn btn-danger" name="DeletePizza" >Delete</button>
														</td>
													</form>
												</tr>
												
											<?php
											}
										}
									?>
								</tbody>
							</table>
						</div>
					</div>


					<div class="tab-pane fade" id="pills-drinks" role="tabpanel" aria-labelledby="pills-drinks-tab">
						<div class="TableContent">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Id</th>
										<th scope="col">Image</th>
										<th scope="col">Name</th>
										<th scope="col">Price &#8372;</th>
										<th scope="col">Options</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$data = get_drinks();
										if(count($data) != 0){
											foreach($data as $item){
												$path = "../../" . $item['image'];
												?>
												<tr>
													<form action="options.php" method="POST">
														<th> <?php echo $item['id'] ?> </th>
														<td> <img class='tableimg' src='<?php echo $path ?>'> </td>
														<td> <input type="text" value="<?php echo $item['name'] ?>" 	name="Name"> </td>
														<td> <input type="text" value="<?php echo $item['price'] ?>" 	name="Price"> </td>
														<td>
															<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
															<button type="submit" name="EditDrinks" class="btn btn-dark">Edit</button>
															<button type="submit" class="btn btn-danger" name="DeleteDrinks" >Delete</button>
														</td>
													</form>
												</tr>
											<?php
											}
										}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">
						<div class="AddContent">
							<div class="AddItem">
								<h5 style="text-align: center;">Add new pizza</h5>

								<form enctype="multipart/form-data" method="POST" action="options.php">
									<label>Name</label>
    								<input type="text" class="form-control" placeholder="Name" name="ItemName">
									<label>Ingredients</label>
    								<input type="text" class="form-control" placeholder="Ingredients" name="ItemIng">
									<label>Weight</label>
    								<input type="number" class="form-control" value="100" min="0" max="1500" name="ItemWeight">
									<label>Price</label>
    								<input type="number" class="form-control" value="100" min="0" max="1500" name="ItemPrice">
									<label >Image 370x520</label>
    								<input type="file" class="form-control-file" accept="image/x-png,image/gif,image/jpeg" name="ItemImage">
									<br>
									<button type="submit" name="AddPizza" class="btn btn-success additem">Add</button>
								</form>

							</div>

							<div class="AddItem">
								<h5 style="text-align: center;">Add new drink</h5>
								<form enctype="multipart/form-data" method="POST" action="options.php">
									<label>Name</label>
    								<input type="text" class="form-control" placeholder="Name" name="ItemName">
									<label>Price</label>
    								<input type="number" class="form-control" value="0" min="0" max="1500" name="ItemPrice">
									<label >Image 370x520</label>
    								<input type="file" class="form-control-file" accept="image/x-png,image/gif,image/jpeg" name="ItemImage">
									<br>
									<button type="submit" name="AddDrink" class="btn btn-success additem">Add</button>
								</form>
							</div>
						</div>
					</div>



				</div>
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