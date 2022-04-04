<?php 
session_start();
$qrcode 	= "qr";
$username 	= "";
$email	  	= "";
$firstname	= "";
$lastname 	= "";
$gender	 	= "";
$contact	= "";
$address	= "";
$admin_customer = "c";
$errors   = array();

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['reg_user'])) {

	$qrcode 	= mysqli_real_escape_string($db, $_POST['qrcode']);
	$firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname  	= mysqli_real_escape_string($db, $_POST['lastname']);
	$email	    = mysqli_real_escape_string($db, $_POST['email']);
	$gender	    = mysqli_real_escape_string($db, $_POST['gender']);
	$contact	= mysqli_real_escape_string($db, $_POST['contact']);
	$email	    = mysqli_real_escape_string($db, $_POST['email']);
	$address	    = mysqli_real_escape_string($db, $_POST['address']);
	$username   = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$admin_customer = mysqli_real_escape_string($db, $_POST['c']);

	// checking filled
	
	if (empty($firstname)) { 
		array_push($errors, "-firstname is required");
	}
	if (empty($lastname)) { 
		array_push($errors, "-lastname is required");
	}
	if (empty($gender)) { 
		array_push($errors, "-gender is required");
	}
	if (empty($contact)) { 
		array_push($errors, "-contact is required");
	}

	if (empty($email)) {
		array_push($errors, "-Email is required");
	}
	if (empty($address)) { 
		array_push($errors, "-address is required");
	}
	if (empty($username)) { 
		array_push($errors, "-Username is required");
	}
	if ($password_1 != $password_2) {
		array_push ($errors, "-Password you typed doesn't match");
	} 

	if (empty($password_1)) {
		array_push($errors, "-Password is required");
	}

	$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	// Checking user in database
	if ($user) {
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors, "Email already exists");
		}
	}

	echo "Total error: " . count($errors);

	// Insert New Data
	if (count($errors) == 0) {
		$password = md5($password_1);

		$query = "INSERT INTO users (qrcode,firstname,lastname,gender,contact, email,address,username, password,admin_customer) VALUES ('$qrcode','$firstname','$lastname','$gender','$contact', '$email','$address','$username', '$password','$admin_customer')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success']  = "You're now logged in";
		header('location: dashboard.php');
	}

}

// Click Login
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}

	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success']  = "You are now logged in";
			header('location: dashboard.php');
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>