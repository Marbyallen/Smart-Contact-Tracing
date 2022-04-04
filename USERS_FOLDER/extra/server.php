<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'u923368226_tracingconnect', 'Mainsct21!', 'u923368226_contactTracing');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Fname  = mysqli_real_escape_string($db, $_POST['First_Name']);
  $Lname  = mysqli_real_escape_string($db, $_POST['Last_Name']);
  $gender  = mysqli_real_escape_string($db, $_POST['Gender']);
  $Cnumber  = mysqli_real_escape_string($db, $_POST['Contact_No']);
  $address  = mysqli_real_escape_string($db, $_POST['Address']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $Eaddress = mysqli_real_escape_string($db, $_POST['Email_Address']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($Eaddress)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users_table WHERE username='$username' OR Email_Address='$Eaddress' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['Email_Address'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users_table (First_Name, Last_Name, Gender , Contact_No, Address, username, Email_Address, password) 
  			  VALUES('$Fname', '$Lname', '$gender', '$Cnumber', '$address', '$username', '$Eaddress', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: hadmin.html');
  }
}

// ... 
// ... 

// LOGIN USER
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
                    $query = "SELECT * FROM Users_table WHERE username='$username' AND password='$password'";
                    $results = mysqli_query($db, $query);
                    if (mysqli_num_rows($results) == 1) {
                      $_SESSION['username'] = $username;
                      $_SESSION['success'] = "You are now logged in";
                      header('location: index.php');
                    }else {
                              array_push($errors, "Wrong username/password combination");
                    }
          }
        }
        
        ?>