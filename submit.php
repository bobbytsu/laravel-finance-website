<?php

session_start();

$username = "";
$errors = array();

//connect to db

$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");

//register uesrs
if(isset($_POST['add_data'])){
	$username = $_POST['username'];
	$catatan = $_POST['catatan'];
	$tipe = $_POST['tipe'];
	$jumlah = $_POST['jumlah'];
	$tanggal = date("Y-m-d H:i:s");

	if(empty($username)){array_push($errors, "Username is required");}
	if(empty($catatan)){array_push($errors, "Catatan is required");}
	if(empty($tipe)){array_push($errors, "Tipe is required");}
	if(empty($jumlah)){array_push($errors, "Jumlah is required");}

	if(count($errors) == 0){
		$query = "INSERT INTO transactions (username, catatan, tipe, jumlah, tanggal) VALUES ('$username', '$catatan', '$tipe', '$jumlah', '$tanggal')";

		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Upload success";

		header('location: home.php');
	}
}


?>