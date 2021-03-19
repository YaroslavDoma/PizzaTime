<?php
    require_once "database/functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home - PizzaTime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" href="images/logo.png">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="main.js" ></script>
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
			<li class="nav-item active">
			  <a class="nav-link" href="Index.php">Home</a>
			</li>
			<li class="nav-item">
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

	<div class="imgCarousel">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img class="d-block w-100" src="images/pizza.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="images/pizza2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="images/pizza5.jpg" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
	</div>

	<div class="Line"></div>

	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-pizza-tab" data-toggle="pill" href="#pills-pizza" role="tab" aria-controls="pills-pizza" aria-selected="true">Pizza</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-drinks-tab" data-toggle="pill" href="#pills-drinks" role="tab" aria-controls="pills-drinks" aria-selected="false">Drinks</a>
		</li>
	</ul>

	<form method="POST" action="paymentmenu.php">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<div class="">
			</div>
			<li class="nav-item">
				<button type="submit" name="toPaymentMenu" class="btn btn-success mb-2 sendOrderBtn"> <img src="images/basket.png" width="35" height="35"> To payment menu</button>
			</li>
		</ul>

	
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-pizza" role="tabpanel" aria-labelledby="pills-pizza-tab">
				<div class="Cards">
					<?php
						$dataPizza = get_pizza();
						if(count($dataPizza) == 0){
							echo "Sorry. Something get wrong";
						}
					?>

					<?php 
						$count = 0;
						foreach ($dataPizza as $item): 
							$count++;
						?>
						<div class="card" <?php echo "id='card-$count'" ?> onclick="onDivClick(<?php echo $count?>)" style="width: 18rem;">
							<img class="card-img-top" src="<?php echo $item["image"]?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?php echo $item["name"]?></h5>
								<p class="card-text"><?php echo $item["ingredients"]?></p>
								
								<div class="price-order">
									<div class="price-info">
										<h5 class="card-title"><?php echo $item["weight"]?>g / <?php echo $item["price"]?>&#8372;</p>
									</div>
									<div class="order-button">
										<input class="checkBox" type="checkbox" name="pizza[]" value="<?php echo $item['name']?>" <?php echo "id='check-$count'" ?> />
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="tab-pane fade" id="pills-drinks" role="tabpanel" aria-labelledby="pills-drinks-tab">

				<div class="CardContent">
					<div class="Cards">
						<?php
							$dataDrinks = get_drinks();
							if(count($dataDrinks) == 0){
								echo "Sorry. Something get wrong";
							}
						?>

						<?php foreach ($dataDrinks as $item): 
								$count++;
							?>
							<div class="card" <?php echo "id='card-$count'" ?> onclick="onDivClick(<?php echo $count?>)" style="width: 18rem;">
								<img class="card-img-top" src="<?php echo $item["image"]?>" alt="Card image cap">
								<div class="card-body" style="height: 150px;">
									<h5 class="card-title"><?php echo $item["name"]?></h5>
									
									<div class="price-order">
										<div class="price-info">
											<h5 class="card-title">1 liter / <?php echo $item["price"]?>&#8372;</p>
										</div>
										<div class="order-button">
											<input class="checkBox" type="checkbox" name="drinks[]" value="<?php echo $item['name']?>" <?php echo "id='check-$count'" ?> />
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				
			</div>
		</div>
	</form>

	<?php
		 
	?>


	<footer>
	</footer>

	<script>
		// CAN'T SEND FORM AFTER RELOADING PAGE
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
    </script>
</body>
</html>