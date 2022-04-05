<?php

session_start();

if(isset($_SESSION['QRcode']))
{
	unset($_SESSION['QRcode']);

}

header("Location: adminlogin.php");
<<<<<<< HEAD
die; 
?>
=======
die;
>>>>>>> parent of 45d3bfb (Revert "Merge branch 'master' of https://github.com/Marbyallen/Smart-Contact-Tracing")
