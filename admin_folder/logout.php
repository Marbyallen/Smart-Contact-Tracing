<?php

session_start();

if(isset($_SESSION['QRcode']))
{
	unset($_SESSION['QRcode']);

}

header("Location: adminlogin.php");
die; 
?>
