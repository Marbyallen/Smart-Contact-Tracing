<?php
	session_start();
    include('function.php');
    include('connection.php');
    $user_data = check_login($con);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
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
        <div class="inside">
            <!-- <div class="profilepic">
                <p>NO PICTURE</p>
            </div> -->
                <div class="detail_wrapper">
                    <section class="detail_header">
                        <p>PERSONAL INFORMATION</p>
                    </section>
                    <section class="detail">
                        <section class="detail-row-1">
                        <?php
                        $genderString = "";
                        if($user_data['gender'] == 'F'){
                            $genderString = "EMALE";
                        } else {
                            $genderString = "ALE";
                        }
                        ?>
                            <ul class="firstname"><p>NAME</p> <?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?><strong></ul>
                            <ul><p>GENDER</p> <?php echo $user_data['gender'] . $genderString ?><strong></ul>
                        </section>
                        <section class="detail-row-2">
                            <ul class="contact"><p>CONTACT NUMBER</p><?php echo $user_data['contactno']; ?></ul>
                            <ul class="address"><p>ADDRESS</p><?php echo $user_data['address']; ?></ul>
                        </section>
                    </section>
                    
                </div>
                <!-- <div class="button_edit">
                    <button class="EDIT"><p>EDIT</p></button>
                </div> -->
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
      </div>
</body>

</html>