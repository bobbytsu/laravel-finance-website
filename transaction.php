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

	//register uesrs
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Where Did My Money Go?</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">

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
		      		<li class="nav-item">
		        		<a class="nav-link" href="home">Home</a>
		      		</li>
		      		<li class="nav-item active">
		        		<a class="nav-link" href="dompet">Dompet<span class="sr-only">(current)</span></a>
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
					  		<?php echo $username;?>
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
	    <div class="row text-center">
	        <div class="col-12" style="padding-bottom: 0">
	            <h1>DOMPET</h1>
	        </div>
	    </div>
	    <hr class="my-4">
	</div>

	<div class="container row justify-content-center">
		<div class="row text-center">
			<div class="col-12">
				<label>Choose Date</label>
				<form action="transaction.php" method="post" class="form-inline">
					<div class="dates" style="color:#2471a3; ">
						<input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off" >
					</div>
					<div style="margin-left: 20px;">
						<button type="submit" class="btn btn-primary" name="transaction_date">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
	    <hr class="my-4">
	    <div class="row text-center">
	        <div class="col-12" style="padding-bottom: 0">
	            <p>Here is the results:</p>
	        </div>
	    </div>
	</div>
	<?php
		if(isset($_POST['transaction_date'])){
				$tanggal = date('Y-m-d', strtotime($_POST['event_date']));
				$sql = "SELECT * FROM transactions WHERE '$username' = transactions.username AND transactions.tanggal LIKE '$tanggal%' ORDER BY tanggal DESC";
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
										<div class="col-md-10">
									  		<?php echo $row["catatan"];?>
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
				}else{
	?>
				<div class="container">
				    <hr class="my-4">
				    <div class="row text-center">
				        <div class="col-12" style="padding-bottom: 0">
				            <p>Sorry, There is no data for <?php echo $tanggal;?></p>
				        </div>
				    </div>
				</div>
	<?php
				}
			}
	?>


	<script>
		$(function(){$('.dates #usr1').datepicker({
			'format': 'yyyy-mm-dd',
			'autoclose':true
			});
		});
	</script>



	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>