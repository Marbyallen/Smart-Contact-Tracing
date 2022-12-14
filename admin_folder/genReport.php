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

    <style>
      #Form {
        visibility: hidden;
      }
      #print_button {
        visibility: hidden;
      }
      #printableTable {
        visibility: hidden;
      }
      #testContent{
        visibility: visible;
      }
    </style>
            
  </head>
  <body>
    <main>
      <h1>Generate Report</h1>
      Welcome, <?php echo $user_data['firstname']. " " .$user_data['lastname']; ?>
      <br>
      <!-- search area -->
      <div id = "Form">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
              <div class="row"><br>
                <div class="col-md-4">
                    <input id="fname" name="Sfname" type="text" placeholder="First Name" class="form-control input-md">
                    <button type="submit" class="btn btn-primary" >Search</button>      
                </div>     
                <div class="col-md-4">
                    <input id="lname" name="Slname" type="text" placeholder="Last Name" class="form-control input-md">
                </div>
                <div class="col-md-4">
                    <input id="qrcode" name="QRcode" type="text" placeholder="QR code" class="form-control input-md">
                </div>
              </div><br>

              <!-- Date input -->
              <div class="row">
                <div class="col-md-4">
                <label>From:</label>
                <input type="date" class="form-control" placeholder="Start" name="date1" class="form-control input-md">
                </div>
                <div class="col-md-4">
                <label>To</label>
                <input type="date" class="form-control" placeholder="End" name="date2" class="form-control input-md">
                </div>
                <br>
              </div><br>
              <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span>Search</button><br>

              <br>
              
        </form> <br>
      </div>
      
      <div id = "print_button">
        <!-- printableTable -->
        <input class="btn btn-primary" type="button" onclick="printDiv('printableTable')" value= "Print this page" /><br>
      </div>
      

    
      <div id ="printableTable" style="overflow-x: auto;">
      <table class="table table-bordered" id = "tableId">
        <?php 
        include 'genReportTable.php' 
        ?>    
      </div>

      <div id = "testContent">
      <p id="demo"></p>
      <p id="demo2"></p>

      </div>
    
      <script>
        function printDiv(printableTable){
          var printContents = document.getElementById(printableTable).innerHTML;
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
        }
        // Retrieving data:
        let text = localStorage.getItem("testJSON");
        //checking text content
        console.log("text content: ", text);
        console.log("typeof text: ", typeof text);
        let obj = JSON.parse(text);
        //checking obj content
        console.log("obj content: ", obj);
        console.log("typeof obj: ", typeof obj);

        document.getElementById("demo").innerHTML = text;
        document.getElementById("demo2").innerHTML = obj;
      </script>

      <?php
        $text = json_decode(['text']);

        $obj = json_decode(['obj']);
    
        $textLength = count($text);
        $objLength = count($obj);
        echo "<br>text count: " . $textLength;
        echo "<br>obj count: " . $objLength;

        // $user_info = json_encode(['obj']);

        // echo "<br>user info<br>";
        // $user_info = $obj;
        // $msg1 = "user_info count:";
        // echo count($msg1 + $user_info); 
        // echo "<br>";

        function echo_arr($arr){
          for ($i=0; $i < count($arr); $i++) { 
                  echo $arr[$i];
                  echo "<br>";
              }
        }

        // echo_arr($user_info);
        echo_arr($text);
        echo_arr($obj);
      ?>
    </main>
  </body>
</html>