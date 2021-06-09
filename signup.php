<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Where Did My Money Go?</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light ">
		<div class="container">
		  <a class="navbar-brand" href="#"><img src="image/money.jpg" class="img-fluid"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Where Did My Money Go? <span class="sr-only">(current)</span></a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <div class="dropdown show">
						<button type="button" class="btn btn-primary"><a href="login.php" class="link-btn">Login</a></button>
						<button type="button" class="btn btn-secondary"><a href="signup.php" class="link-btn">Sign Up</a></button>
					</div>
		    </form>
		  </div>
		</div>
	</nav>

	<div class="container">
		
	</div>
	<div class="container row justify-content-center" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="col-md-6">
			<div class="card">
				<div style="padding: 20px;">
					<h4>Registration Form</h4>
					<hr>
					<form action="signup.php" method="post">
						<div class="form-group">
							<label for="username">Username </label>
							<input type="text" name="username" class="form-control" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="first_name">First Name </label>
							<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
						</div>
						<div class="form-group">
							<label for="last_name">Last Name </label>
							<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
						</div>
						<div class="form-group">
							<label for="email">Email </label>
							<input type="email" name="email" class="form-control" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="phone_number">Phone Number </label>
							<input type="tel" name="phone_number" class="form-control" placeholder="Phone Number" required>
						</div>
						<div class="form-group">
							<label for="password">Password </label>
							<input type="password" name="password_1" class="form-control" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label for="password">Confirm Password </label>
							<input type="password" name="password_2" class="form-control" placeholder="Confirm Password" required>
						</div>
						<?php include('errors.php') ?>
						<div class="form-submit">
							<button type="submit" class="btn btn-primary" name="reg_user">Sign Up</button>

							<p>Already a user?<a href="login.php"><b>Log In</b></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<footer>
		<div class="container">
			<div class="row text-center">
				<div class="col-12" id="alamat-footer">
					<hr class="light" id="copyright-hr">
					<p>&copy; COPYRIGHT  2019 Where Did My Money Go?</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>