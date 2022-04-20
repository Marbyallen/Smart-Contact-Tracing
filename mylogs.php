<?php
	session_start();
    include('function.php');
    include('connection.php');
    $user_data = check_login($con);
    $userQRcode = $_SESSION['QRcode'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mylogs.css">
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
            <div class="second-header">
            <section class = "detail_header">
            <p>welcome to my logs</p>
            </section>  
            <div class="mylogs-table">
            <table>
            <?php
                // SELECT QRcode, firstname, lastname, station, facialimg, date, time, bodyheat_temp
                // FROM usersAndStations_table WHERE QRcode LIKE 'qr8' 
                $result = mysqli_query($con," SELECT  * FROM usersAndStations_table WHERE QRcode LIKE '".$userQRcode."' ");
                
                    echo "
                        <tr>
                        <th>QR code</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Station</th>
                        <th>Facial img url</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Body Heat Temperature</th>
                        </tr>
                    ";
                        
                        while($row = mysqli_fetch_array($result))
                            {
                            echo "<tr>";
                            echo "<td>" . $row['QRcode'] . "</td>";
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $row['station'] . "</td>";
                            echo "<td>" . $row['facialimg'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['bodyheat_temp'] . "</td>";
                            echo "</tr>";
                            }
                        echo "</table>";
                        mysqli_close($con);
            ?>
            </div>
            
                    
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