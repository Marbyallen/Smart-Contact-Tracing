<?php
session_start();

	include('db_connect.php');
	include('admin_functions.php');
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
                   <main>
                    <h1>Generate Report</h1>
                    Welcome, <?php echo $user_data['firstname']. " " .$user_data['lastname']; ?>
                   </main>
          </body>
</html>