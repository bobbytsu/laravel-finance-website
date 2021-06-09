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
							<a class="dropdown-item" href="profile.php">Profile</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</div>
			    </form>
			</div>
		</div>
	</nav>
 

 	<!--if the user logs in print information about him-->
 	<div class="container">
 		<br>
 		<h2 id="username_value">Hi, <?php echo $user['fname']. " ". $user['lname'];?></h2>
		<div class="row center events-card">
	        <div class="col-md-6">
	            <div class="card">
	                <div class="card-body row center">
	                	<div class="col-sm-4">
	                		<img src="image/income.png" class="img-fluid">
	                	</div>
	                	<div class="col-sm-8">
	                    <h3 class="card-title">Pemasukan bulan ini</h3>
	                    <?php
	                    	$bulan = date('Y-m', time());
							$results = mysqli_query($db, "SELECT SUM(jumlah) AS total FROM transactions WHERE '$username' = username AND tipe = 'pemasukan' AND tanggal LIKE '$bulan%'");
							$row = mysqli_fetch_assoc($results);
							$pemasukanSum = $row['total'];
							echo "<p class='card-text'>Rp. ". $pemasukanSum . ",-</p>";
						?>
	                   </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-6">
	        	<div class="card">
	                <div class="card-body row center">
	                	<div class="col-sm-4">
	                		<img src="image/spending.png" class="img-fluid">
	                	</div>
	                	<div class="col-sm-8">
	                    	<h3 class="card-title">Pengeluaran Bulan ini</h3>
	                    	<?php
	                    		$bulan = date('Y-m', time());
								$results = mysqli_query($db, "SELECT SUM(jumlah) AS total FROM transactions WHERE '$username' = username AND tipe = 'pengeluaran' AND tanggal LIKE '$bulan%'");
								$row = mysqli_fetch_assoc($results);
								$pengeluaranSum = $row['total'];
								echo "<p class='card-text'>Rp. ". $pengeluaranSum . ",-</p>";
							?>
	                   </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <hr>
	    <div class="row text-center">
	    	<div class="col-12">
	    		<div class="card border border-primary">
	        	<h2>Sisa Saldo</h2>        
	        	<?php
					$saldo = $pemasukanSum-$pengeluaranSum;
					echo "<h3 class='card-text bg-primary text-white'><b>Rp. ". $saldo .",-</b></h3>";
				?>
	        	</div>
	    	</div>
	    </div>
	</div>
	<hr>
	<div class="container">
		<div class="alert alert-success" role="alert">
		<div class="row">
			<div class="col-12 text-center">
				<a href="#" class="btn btn-outline-secondary" data-toggle="modal" data-target="#inputData"><i class="fas fa-plus"></a></i>
			</div>
		</div>
		</div>
	</div>
	<?php 
		$sql = "SELECT * FROM transactions WHERE '$username' = username AND tanggal LIKE '$bulan%' ORDER BY tanggal DESC";
		$results = mysqli_query($db, $sql);
		if($results -> num_rows > 0){
			while($row = $results ->fetch_assoc()){
				if($row['tipe'] == 'pengeluaran'){
	?>
					<div class="container">
						<div class="alert alert-danger" role="alert">
							<div class="row">
								<div class="col-md-5">
								  	<?php echo $row["catatan"];?>
								</div>
								<div class="col-md-5" style="padding-left: 0;">
								  	<?php echo $row["tanggal"];?>
								</div>
								<div class="col-md-2">
									<?php echo "Rp. ". $row["jumlah"];?>
								</div>
							</div>
						</div>
					</div>

	<?php
				}else{
	?>
					<div class="container">
						<div class="alert alert-primary" role="alert">
							<div class="row">
								<div class="col-md-5">
								  	<?php echo $row["catatan"];?>
								</div>
								<div class="col-md-5" style="padding-left: 0;">
								  	<?php echo $row["tanggal"];?>
								</div>
								<div class="col-md-2">
									<?php echo "Rp. ". $row["jumlah"];?>
								</div>
							</div>
						</div>
					</div>
	<?php	
				}
			}
		}
	?>



 	<div class="modal fade bd-example-modal-lg" id="inputData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Menambahkan Data Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="submit.php">
						<div>
							<label>User</label>
					       		<?php echo "<input type='text' class='form-control' name='username' value='$username' readonly >"; ?>
					    </div>
			      		<div>
							<label>Catatan</label>
		       				<input type="text" class="form-control" name="catatan">
		       			</div>
		       			<div>
							<label>Tipe</label>
							<select class="form-control" name="tipe">
								<option value="pengeluaran">Pengeluaran</option>
								<option value="pemasukan">Pemasukan</option>
							</select>
			      		</div>
			      		<div>
							<label>Jumlah</label>
			       			<input type="number" class="form-control" name="jumlah">
			      		</div>
			      		<hr>
			      		<div>
							<input type="submit" class="btn btn-primary" name="add_data">
			      		</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

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

 </body>
 </html>