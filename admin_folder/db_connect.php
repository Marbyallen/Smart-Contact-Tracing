<?php
#server executed code
#this connects php to mySQL
// 4 variable to connect to database
$dbhost = "localhost";
$dbusername = "u923368226_tracingconnect";
$dbuser_pass = "Mainsct21!";
$database_in_use = "u923368226_contactTracing";

// create database connection instance
$mysqli = new mysqli($dbhost, $dbusername, $dbuser_pass, $database_in_use);
?>