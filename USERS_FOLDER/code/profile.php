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
    <link rel="stylesheet" href="profile.css">
    <title>THESIS</title>
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
      <div class="wrapper">
        <div class="inside">
            <div class="profilepic">
                <p>NO PICTURE</p>
            </div>
                <div class="detail_wrapper">
                    <section class="detail_header">
                        <p>PERSONAL INFORMATION</p>
                    </section>
                    <section class="detail">
                        <section class="detail-row-1">
                            <ul class="firstname"><p> FIRST NAME</p> <?php echo $_SESSION['username']; ?><strong></ul>
                            <ul class="firstname"><p>LAST NAME</p><?php echo $_SESSION['lastname']; ?></ul>
                        </section>  
                        <section class="detail-row-2">
                            <ul class="firstname"><p>CONTACT NUMBER</p><?php echo $_SESSION['contact']; ?></ul>
                            <ul class="firstname"><p>ADDRESS</p><?php echo $_SESSION['address']; ?></ul>
                        </section>
                    </section>
                </div>
                <div class="button_edit">
                    <button class="EDIT"><p>EDIT</p></button>
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
                
        </div>
      </div>
</body>

</html>