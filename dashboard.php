<?php
	session_start();
    include('function.php');
    include('connection.php');
    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
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
                <?php if (isset($_SESSION['QRcode'])) : ?>
                    <p>Welcome <strong><?php echo $user_data['firstname']; echo $user_data['lastname'];  ?><strong></p>
                <?php endif ?>
            </div>
            <div class="sidebar">   
                <ul>
                    <li><button><a href="dashboard.php">DASHBOARD</a></button></li>
                    <li><button><a href="profile.php">PROFILE</a> </button></li>
                    <li><button><a href="qrcode.php">QR CODE</a></button></li>
                    <li><button><a href="mylogs.php">MY LOGS</a></button></li>
                </ul>
            </div>
            <div class="sidebar_bottom">
                 <ul>
                    <li><button><a href="logout.php" >LOG OUT</a></button></li>
                  
                </ul>
            </div>
                
      </div>
</body>

</html>