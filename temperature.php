<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="qrcode.css">
      <title>QR Code Generator</title>
</head>
<header>
<nav class="nav">
    <div class="logo"><a href="index.php">CONTACT <span>TRACING</span></a></div>
    <ul class="nav_link">
    </ul>
    <div class="nav_button">
    </div>
</nav>
</header>
<body>
    <div c  lass="wrapper">


    </div>
    <div class="sidebar">
        <ul>
            <li><button><a href="dashboard.php">DASHBOARD</a></button></li>
            <li><button><a href="profile.php">PROFILE</a> </button></li>
            <li><button><a href="qrcode.php">QR CODE</a></button></li>
            <li><button><a href="temperature.php">TEMPERATURE</a></button></li>
        </ul>
    </div>
    <div class="sidebar_bottom">
        <ul>
            <li><button><a href="index.php?logout='1'" >LOG OUT</a></button></li>
        </ul>
    </div>
  
</body>

</html>