<?php 
session_start();
include('connection.php');
include('function.php');
$username 	= "";
$email	  	= "";
$firstname	= "";
$lastname 	= "";
$gender	 	= "";
$contact	= "";
$address	= "";
$admin_customer = "c";
$errors   = array();
$success   = array();
$emailinput = "";
static $qrcode;
$link1 = "https://chart.googleapis.com/chart?cht=qr&chl=";
$link3 = "&chs=160x160&chld=L|0";

if (isset($_POST['reg_user'])) {

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$contactno = $_POST['contactno'];
	$email = $_POST['email'];
	$emailinput = $_POST['emailinput'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password_1 = $_POST['password_1'];
	$password_2 =$_POST['password_2'];
	$user_check_query = "SELECT * FROM Allusers_table WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($con, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	// Checking user in database
	if ($user) {
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors, "Email already exists");
		}
		if ($password_1 != $password_2) {
		array_push ($errors, "-Password you typed doesn't match");
		} 
	}


	// Insert New Data
	if (count($errors) == 0) {
		if ($password_1 != $password_2) {
		array_push ($errors, "-Password you typed doesn't match");
	} 
		$password = md5($password_1);
		$link2 = $username . $contactno;
		$pwd = encrypt_decrypt($link2, 'encrypt');
		$qrcode = $link1 . $username . $contactno . $link3;
		$query = "INSERT INTO Allusers_table (qrcode,firstname,lastname,gender,contactno, email,address,username, password,admin_customer) 
		VALUES ('$pwd','$firstname','$lastname','$gender','$contactno','$emailinput$email','$address','$username', '$password','$admin_customer')";
		if (mysqli_query($con, $query)) {
			array_push($success, "Register success, you may login");
			} else {
			echo "Error: " . $query . "<br>" . mysqli_error($con);
		}
	}

}


// Click Login
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}

	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);

		// $query = "SELECT * FROM Allusers_table WHERE username='$username' AND password='$password'";
		$query = "SELECT * FROM Allusers_table WHERE username = '".$username."' AND password = '".$password."' limit 1 ";
		$results = mysqli_query($con, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success']  = "You are now logged in";
			header('location: dashboard.php');
		} else {
			array_push($errors, "Wrong username or password");
		}
	}
}

?>