<?php

session_start();
    include("db_connect.php");
    include("function.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="\css\profile.css">
    <title>THESIS</title>
</head>
<header>
<nav class="nav">
    <div class="logo"><a href="index.html">CONTACT <span>TRACING</span></a></div>
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
                            <ul class="firstname"><p> FIRST NAME</p> <li>PHP FILE </li></ul>
                            <ul class="firstname"><p>LAST NAME</p><li>PHP FILE </li></ul>
                            <ul class="firstname"><p>AGE</p><li>PHP FILE </li></ul>
                        </section>  
                        <section class="detail-row-2">
                            <ul class="firstname"><p>CONTACT NUMBER</p><li>PHP FILE </li></ul>
                            <ul class="firstname"><p>ADDRESS</p> <li>PHP FILE </li></ul>
                        </section>
                    </section>
                </div>
                <div class="button_edit">
                    <button class="EDIT"><p>EDIT</p></button>
                </div>
                <div class="sidebar">
                    <ul>
                        <li><button><a href="dashboard.html">DASHBOARD</a></button></li>
                        <li><button><a href="profile.html">PROFILE</a> </button></li>
                        <li><button><a href="qrcode.html">QR CODE</a></button></li>
                        <li><button><a href="temperature.html">TEMPERATURE</a></button></li>
                    </ul>
                </div>
                <div class="sidebar_bottom">
                    <ul>
                        <li><button><a href="profile.html">LOG OUT</a></button></li>
                    </ul>
                </div>
                
        </div>
      </div>
</body>

</html>