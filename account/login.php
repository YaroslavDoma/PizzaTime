<?php
	session_start();
    require_once "../database/functions.php";
	
	if($_SESSION['user']){
		header("Location: profile.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
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
			<li class="nav-item">
			  <a class="nav-link" href="../Index.php">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="../about.php">About</a>
			</li>
			<li class="nav-item">
				<a href="login.php">
					<button type="button" class="btn btn-light" >Log In</button>
				</a>
			</li>
		  </ul>
		</div>
	</nav>

	<div class="content">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Log In</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-logon-tab" data-toggle="pill" href="#pills-logon" role="tab" aria-controls="pills-logon" aria-selected="false">Log On</a>
			</li>
		</ul>
		
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
				<div class="loginform">
					<form method="POST" action="signin.php">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="Email">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="Password">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-dark">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="tab-pane fade" id="pills-logon" role="tabpanel" aria-labelledby="pills-logon-tab">
				<form method="POST" action="signup.php">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="Email">

							<label>Password</label>
							<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="Password">
							<label>Confirm password</label>
							<input type="password" class="form-control" id="inputPassword4" placeholder="Confirm password" name="Password2">

							<label>Name</label>
							<input type="text" class="form-control" id="Name" placeholder="Name" name="Name">

							<label >Phone</label>
							<input type="phone" class="form-control" id="phone-number" placeholder="Phone" name="Phone">
			
							<label for="Gender">Gender</label>
							<select id="Gender" class="form-control" name="Gender">
								<option selected disabled>Choose...</option>
								<option>Male</option>
								<option>Female</option>
							</select>
							<br>
							<button type="submit" class="btn btn-dark reg">Sign up</button>
						</div>
					</div>
				</form>
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