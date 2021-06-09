<?php

session_start();

//initializing variables
$username = "";
$email = "";
$errors = array();

//connect to db

$db = mysqli_connect('localhost','root','','project') or die("could not connect to database");

//register uesrs
if(isset($_POST['reg_user'])){
	$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$dateCreated = date("Y-m-d H:i:s");
	//form validation
	if(empty($first_name)){array_push($errors, "First Name is required");}
	if(empty($last_name)){array_push($errors, "Last Name is required");}
	if(empty($username)){array_push($errors, "Username is required");}
	if(empty($email)){array_push($errors, "email is required");}
	if(empty($phone_number)){array_push($errors, "Phone Number is required");}
	if(empty($password_1)){array_push($errors, "password is required");}
	if ($password_1 != $password_2) {array_push($errors, "Password do not match");}
	echo "<script>";
	echo "	$first_name, $last_name, $username";
	echo "</script>";

	//check db for existing user with same username
	$user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
	$results = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($results);

	if($user){
		if($user['username'] === $username){
			array_push($errors, "Username already exists");
		}
		if($user['email'] === $email){
			array_push($errors, "This email already has a registered username");
		}
	}

	//register the user if no error
	if(count($errors) == 0){
		$password = md5($password_1); //this will encrypt the password
		$query = "INSERT INTO users (username, fname, lname, email, phone, password, dateCreated) VALUES ('$username', '$first_name', '$last_name', '$email', '$phone_number', '$password', '$dateCreated')";

		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";

		header('location: home.php');
	}
}

//Login user
if(isset($_POST['login_user'])){
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($password)){
		array_push($errors, "Password is required");
	}
	if(count($errors) == 0){

		$password = md5($password);
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);

		if(mysqli_num_rows($results)){
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Logged in successfully";
			header('location: home.php');
		}else{
			array_push($errors, "Wrong username/password combination. Please try again. ");
		}
	}
}


?>