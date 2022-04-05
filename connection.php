<?php

// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "registration";

$dbhost = "localhost";
$dbuser = "u923368226_tracingconnect";
$dbpass = "Mainsct21!";
$dbname = "u923368226_contactTracing";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
	