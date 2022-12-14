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
      #form{
        visibility: visible;
      }
      #print_button {
        visibility: visible;
      }
      #printableTable {
        visibility: visible;
      }
      #testContent{
        visibility: hidden;
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

      <div id="form">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <!-- get station, date and time -->
            <div class="row"><br>
              <div class="col-md-4">
                  <input id="station" name="station" type="text" placeholder="" class="form-control input-md">
                  <button type="submit" class="btn btn-primary" >Search</button>      
              </div>     
              <div class="col-md-4">
                  <input id="date1" name="date1" type="text" placeholder="" class="form-control input-md">
              </div>
              <div class="col-md-4">
                  <input id="time1" name="time" type="time1" placeholder="" class="form-control input-md">
                  <input id="ctime1" name="time" type="ctime1" placeholder="" class="form-control input-md">
                  <input id="ctime2" name="time" type="ctime2" placeholder="" class="form-control input-md">
              </div>
            </div><br>
        </form> <br>

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

        //calc ctime1 and ctime2
        varTime = obj[8];
        let reptime = varTime.replace(/:/g, "");
        let timeNum = parseInt(reptime);
        let a = 1000;
        let cctime1 = timeNum - a;
        let cctime2 = timeNum + a;

        document.getElementById("station").innerHTML = obj[5];
        document.getElementById("date1").innerHTML = obj[7];
        document.getElementById("time").innerHTML = obj[8];
        document.getElementById("ctime1").innerHTML = cctime1;
        document.getElementById("ctime2").innerHTML = cctime2;

      </script>

      <?php
        $text = json_decode(['text']);

        $obj = json_decode(['obj']);
    
        $textLength = count($text);
        $objLength = count($obj);
        // echo "<br>text count: " . $textLength;
        // echo "<br>obj count: " . $objLength;

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
        // echo_arr($text);
        // echo_arr($obj);
      ?>
    </main>
  </body>
</html>