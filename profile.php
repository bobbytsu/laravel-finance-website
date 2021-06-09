<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:login.php');
	}
?>

<?php
	$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");
	if ($db-> connect_error){
		die("connection_failed:". $db-> connection_error);
	}
	$username = $_SESSION['username'];
		
	$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
	$results = mysqli_query($db, $sql);
	$user = mysqli_fetch_assoc($results);
?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title>Where Did My Money Go?</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		        		<a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="dompet">Dompet</a>
		      		</li>
		      		<li class="nav-item dropdown">
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="#">About Us</a>
		      		</li>
		    	</ul>
			    <form class="form-inline my-2 my-lg-0">
			    	<div class="dropdown show">
						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  		<img src="image/account.png" width="40px" height="30px">
					  		<?php echo $user['fname']. " ". $user['lname'];?>
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</div>
			    </form>
			</div>
		</div>
	</nav>
 
	<div class="container">
	    <hr class="my-4">
	</div>

 	<div class="container">
		<div class="row">
			<hr class="my-4">
			<div class="col-4">
				<img src="image/user-512.jpg" class="rounded-circle" style="width: 250px; height: 250px;">
			</div>
			<div class="col-8">
				<h2>Personal Information</h2>
				<hr class="my-4">
				<div class="row">
					<div class="col-4">
						<p>First Name</p>
					</div>
					<div class="col-8">
						<p>: <?php echo $user['fname'] ?></p>
					</div>
					<div class="col-4">
						<p>Last Name</p>
					</div>
					<div class="col-8">
						<p>: <?php echo $user['lname'] ?></p>
					</div>
					<div class="col-4">
						<p>Username</p>
					</div>
					<div class="col-8">
						<p>: <?php echo $user['username'] ?></p>
					</div>
					<div class="col-4">
						<p>Email</p>
					</div>
					<div class="col-8">
						<p>: <?php echo $user['email'] ?></p>
					</div>
					<div class="col-4">
						<p>Phone Number</p>
					</div>
					<div class="col-8">
						<p>: <?php echo $user['phone'] ?></p>
					</div>
					<div class="col-4">
						<p>Account Created</p>
					</div>
					<div class="col-8">
						<p>: <?php echo $user['dateCreated'] ?></p>
					</div>
					<hr class="my-4">
				</div>
				<hr class="my-4">
				<h2>Dompet Information</h2>
				<hr class="my-4">
				<div class="row">
					<div class="col-4">
						<p>Total Pemasukan</p>
					</div>
					<div class="col-8">
						<p>: Rp. <?php
							$results = mysqli_query($db, "SELECT SUM(jumlah) AS total FROM transactions WHERE '$username' = username AND tipe = 'pemasukan'");
							$row = mysqli_fetch_assoc($results);
							$pemasukanSum = $row['total'];
							echo $pemasukanSum;
						?></p>
					</div>
					<div class="col-4">
						<p>Total Pengeluaran</p>
					</div>
					<div class="col-8">
						<p>: Rp. <?php
								$results = mysqli_query($db, "SELECT SUM(jumlah) AS total FROM transactions WHERE '$username' = username AND tipe = 'pengeluaran'");
								$row = mysqli_fetch_assoc($results);
								$pengeluaranSum = $row['total'];
								echo $pengeluaranSum;
							?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
 	
	<br>
	<footer>
		<div class="container">
			<div class="row text-center">
				<div class="col-12" id="alamat-footer">
					<hr class="light">
					<p>&copy; COPYRIGHT  2019 Where Did My Money Go?</p>
				</div>
			</div>
		</div>
	</footer>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


	<script type="text/javascript">
			
		var username = "<?php echo $user['username'] ?>";
		document.getElementById("username_value").innerHTML += username;
	</script>

 </body>
 </html>