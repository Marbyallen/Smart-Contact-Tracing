<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysqlBbASDWE!@DF#@$9999";
$dbname = "thesis";

// $dbhost = "localhost";
// $dbuser = "u923368226_tracingconnect";
// $dbpass = "Mainsct21!";
// $dbname = "u923368226_contactTracing";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
	
// $db = mysqli_connect('localhost', 'u923368226_tracingconnect', 'Mainsct21!', 'u923368226_contactTracing');