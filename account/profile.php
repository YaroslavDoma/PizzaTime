<?php
	session_start();
    require_once "../database/functions.php";

	if(!$_SESSION['user']){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	<link rel="icon" href="../images/logo.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="../Index.php">
			  <img src="../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			  PizzaTime
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
	  
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active first">
				<a class="nav-link" href="profile.php">Profile</a>
			</li>


			<?php
				if($_SESSION['user']['status'] != "Client"){
			?>
				<li class="nav-item">
					<a class="nav-link" href="profile/orders.php">Active Orders</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profile/delivery.php">Active delivery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profile/adminpanel.php">Admin Panel</a>
				</li>
			<?php
				}
				else{
			?>
				<li class="nav-item">
					<a class="nav-link" href="profile/MyOrders.php">My orders</a>
				</li>
			<?php
				}
			?>

			<li class="nav-item logOutButton">
				<a href="signout.php">
					<button type="button" class="btn btn-light">
						Log Out
					</button>
				</a>
			</li>
		  </ul>
		</div>
	</nav>


	<div class="main">
		<div class="content">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Change password</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Change name</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-phone-tab" data-toggle="pill" href="#pills-phone" role="tab" aria-controls="pills-phone" aria-selected="false">Change phone</a>
				</li>
			</ul>
				
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					
					<?php
						if($_SESSION['user']['gender'] == "Male"){
							$path = "../images/Male.jpg";
						}else{
							$path = "../images/Female.jpg";
						}
						if($_SESSION['user']['status'] == "Admin"){
							$path = "../images/admin.jpg";
						}
					?>

					<div class="card">
						<img class="card-img-top" src="<?php echo $path ?>" alt="avatar">
						<div class="card-body">
							<p> <strong>Name: </strong> <?php echo $_SESSION['user']['name'] ?> </p>
							<p> <strong>Email: </strong> <?php echo $_SESSION['user']['email'] ?> </p>
							<p> <strong>Phone: </strong> <?php echo $_SESSION['user']['phone'] ?> </p>
							<p> <strong>Status: </strong> <?php echo $_SESSION['user']['status'] ?> </p>
						</div>
					</div>
				</div>



				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				
					<form method="POST" action="settings/accountOptions.php">
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Old password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword" placeholder="Old password" 		name="OldPassword">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">New password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword" placeholder="New password" 		name="NewPassword1">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Confirm password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword" placeholder="Confirm new password" name="NewPassword2">
							</div>
						</div>
						<button type="submit" class="btn btn-dark" name="ChangePassword" >Change password</button>
					</form>

				</div>

				<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

					<form method="POST" action="settings/accountOptions.php">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">New name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputPassword" placeholder="New name" name="NewName">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Confirm</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword" placeholder="Confirm by password" name="Password">
							</div>
						</div>
						<button type="submit" class="btn btn-dark" name="ChangeName">Change name</button>
					</form>

				</div>

				<div class="tab-pane fade" id="pills-phone" role="tabpanel" aria-labelledby="pills-phone-tab">
					<form method="POST" action="settings/accountOptions.php">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">New phone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputPassword" placeholder="New phone" name="NewPhone">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Confirm</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword" placeholder="Confirm by password" name="Password">
							</div>
						</div>
						<button type="submit" class="btn btn-dark" name="ChangePhone">Change phone</button>
					</form>
				</div>


			</div>
		</div>
	</div>

	<?php
		if($_SESSION['messageError']){
			echo '<div class="messageError">' . $_SESSION['messageError'] . '</div>';
			unset($_SESSION['messageError']);
		}

		if($_SESSION['messageSuccess']){
			echo '<div class="messageSuccess">' . $_SESSION['messageSuccess'] . '</div>';
			unset($_SESSION['messageSuccess']);
		}
	?>
	
	
	

	
</body>
</html>