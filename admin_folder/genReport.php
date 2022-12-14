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
    <br>
    
    <script>
      // Retrieving data:
      let text = localStorage.getItem("testJSON");
      //checking text content
      console.log("text content: ", text);
      console.log("typeof text: ", typeof text);

      let obj = JSON.parse(text);
      //checking obj content
      console.log("obj content: ", obj);
      console.log("typeof obj: ", typeof obj);
      

      // document.getElementById("demo").innerHTML = obj.name;
    </script>

    <?php
    $textLength = count($text);
    $objLength = count($obj);
    echo "<br>text count: " . $textLength;
    echo "<br>obj count: " . $objLength;
    // $user_info = json_encode(['obj']);
    echo "<br>user info<br>"
    $user_info = obj[];
    // $msg1 = "user_info count:";
    // echo count($msg1 + $user_info); 
    // echo "<br>";

    function echo_arr($arr){
      for ($i=0; $i < count($arr); $i++) { 
              echo $arr[$i];
              echo "<br>";
          }
    }

    echo_arr($user_info);
    ?>
    </main>
  </body>
</html>