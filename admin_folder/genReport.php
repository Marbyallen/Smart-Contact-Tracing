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
      <div id = "top_content">
        <h1>Generate Report</h1>
        Welcome, <?php echo $user_data['firstname']. " " .$user_data['lastname']; ?>
      <br>
      </div>
      
      <div id = "testContent">
        <p id="demo"></p>
        <p id="demo2"></p>

      </div>

      <!-- printableTable -->
      <div id = "print_button">
        
        <input class="btn btn-primary" type="button" onclick="printDiv('printableTable')" value= "Print this page" /><br>
      </div>
      

    
      <div id ="printableTable" style="overflow-x: auto;">
      <table class="table table-bordered" id = "tableId">
        <?php 
        include 'genReportTable.php' 
        ?>    
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

        $array=json_decode($_POST['text']);
        echo "after decode";
        echo count($array);

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