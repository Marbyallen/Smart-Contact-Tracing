<?php
#server executed code
#this connects php to mySQL
// 4 variable to connect to database
$host = "localhost";
$username = "u923368226_tracingconnect";
$user_pass = "Mainsct21!";
$database_in_use = "u923368226_contactTracing";

// create database connection instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
?>