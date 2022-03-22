<?php 
session_start();

	include("db_connect.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en-US">
          <head> 
            <link rel="stylesheet" type="text/css" href="\assets_admin\mymain1.css">
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Head Admin</title>
                    
          </head>
          <body>
                   <div class="sidenav">
                    <ul class="first">
                              <li> <a class="active" href="hadmin.html">Home</a></li>
                              <li> <a href="registeredUsers.php">Users List</a></li>
                              <li> <a href="adminslist.php">Admins List</a></li>
                              <li><a href="stationslist.php">Stations List</a></li>
                              <li style="float: right"> <a href="index.php">Logout</a></li>
                    </ul>
                   </div>
                   <main>
                    <h1>Welcome to Head Admin Page</h1>
                   </main>
                   
                   
                    
                              
          </body>
</html>