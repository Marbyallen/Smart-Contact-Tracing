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
                  <label for="">Station</label>
                  <input id="station" name="station" type="text" placeholder="" class="form-control input-md">
                        
              </div>     
              <div class="col-md-4">
                <label for="">Date</label>
                  <input id="date1" name="date1" type="text" placeholder="" class="form-control input-md">
              </div><br>
              <div class="col-md-5">
                  <label for="">Time1</label>
                  <input id="time1" name="time" type="time" placeholder="" class="form-control input-md">
                  <label for="">Time2</label>
                  <input id="time2" name="time" type="time" placeholder="" class="form-control input-md">
                  <label for="">Time3</label>
                  <input id="time3" name="time" type="time" placeholder="" class="form-control input-md">
              </div>
            </div><br>
            <button type="submit" class="btn btn-primary" >Search</button>
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

      function checkContent(varName, varContent){
        let varrName = varName;
        let varrContent = varContent;
        let msg1 = "content of " + varrName + ": " + varContent + "<br>";
        let msg2 = "typeof " + varrName + ": " + typeof + varContent + "<br>";
        document.write(msg1);
        document.write(msg2);
      }

        function computeTimeA(x){
          let time = parseInt(x);   //1 number
          
          let time1 = "";
          
          if (time <= 1) {
            time1 = "00";
            // let string_time1 = time1.toString();
            return time1;
          } else if (time == 0){
            time1 = "13";
            return time1;
          } else {
            time1 = time - 1;
            return time1;
            
          }
        }

      function computeTimeB(x){
        let time = x;
        time1 = "";
        if (time <24) {
          time1 = time + 1;
          return time1;
        } else {
          time1 = "01";
          return time1;
        }
      }

      //time from db value
      // const timeValue = "14:50:50";  
      // const removedLast3 = timeValue.slice(0, -3);  //remove last 3 characters 
      // const timeInput = document.getElementById('time1');  
      // timeInput.value = removedLast3;  
      //


        // Retrieving data:
        let text = localStorage.getItem("testJSON");
        let obj = JSON.parse(text);


        //calc ctime1 and ctime2
        // varTime = obj[8];

        const timeValue = obj[8];
        const removedLast3 = timeValue.slice(0, -3);  //remove last 3 characters 
        const timeInput = document.getElementById('time1');  
        timeInput.value = removedLast3;  

        const hr = removedLast3.slice(0, -3);  //01 number
        const string2 = removedLast3.slice(2, 5);  //:50  number
        const string22 = string2.toString();
        

        //                    COMPUTE timeA
        // let timeA = hr - 1;  //00
        let string1_timeA = computeTimeA(hr);
        let string11 = string1_timeA.toString();
        
        let timeA = string11.concat(string22);
        // checkContent('timeA', timeA);
        
        //                    COMPUTE timeB
        let hrNum = parseInt(hr);
        // if hrNum = 24
        let string1_timeB = computeTimeB(hrNum);
        let string11_timeB = string1_timeB.toString();
        let timeB = string11_timeB.concat(string22);
        checkContent('timeB', timeB);

        // let reptime = varTime.replace(/:/g, "");
        // let timeNum = parseInt(reptime);
        // let cctime1 = timeNum - a;
        // let cctime2 = timeNum + a;

        document.getElementById("station").value = obj[5];
        document.getElementById("date1").value = obj[7];
        const timeInputA = document.getElementById('time2');  
        timeInputA.value = timeA;  
        const timeInputB = document.getElementById('time3');  
        timeInputB.value = timeB;  
        // document.getElementById("time1").value = obj[8];
        // document.getElementById("time2").value = cctime1;
        // document.getElementById("time3").value = cctime2;

      </script>

      <?php

      ?>
    </main>
  </body>
</html>