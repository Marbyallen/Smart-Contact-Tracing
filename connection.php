<?php

// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "registration";

$dbhost = "localhost";
$dbuser = "u923368226_tracingconnect";
$dbpass = "Mainsct21!";
$dbname = "registration";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
	
$db = mysqli_connect('localhost', 'u923368226_tracingconnect', 'Mainsct21!', 'u923368226_contactTracing');