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
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<header>
<nav class="nav">
    <div class="logo"><a href="index.php">Tracing<span>Connections</span></a></div>
    <ul class="nav_link">
    </ul>
    <div class="nav_button">
    </div>
</nav>
</header>
<body>
      <div class="wrapper">
            <div class="main-top">
            <?php if (isset($_SESSION['success'])) : ?>
		<div class="error success">
             <!--
			<h3>
				<?php 
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				?>
			</h3>
            -->
		</div>
	<?php endif ?>

	<?php if (isset($_SESSION['username'])) : ?>
		<p>Welcome <strong><?php echo $_SESSION['username']; ?><strong></p>
	<?php endif ?>
            
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
</body>

</html>