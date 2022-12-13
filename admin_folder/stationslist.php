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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Stations List</title>
  </head>
  <style>
    .redirectPage{
    cursor: pointer;
    }
  </style>

  <body>
    <div class="sidenav">
      <ul class="first">
        <li> <a  href="index.php">Home</a></li>
        <li> <a href="registeredUsers.php">Users List</a></li>
        <li> <a href="adminslist.php">Admins List</a></li>
        <li><a class="active" href="stationslist.php">Stations List</a></li>
        <li style="float: right"> <a href="logout.php">Logout</a></li>
      </ul>
    </div>
          <main>
            <h1>Stations List</h1><br>
            <!-- search area -->
            <label>Search name or QR code here</label>  
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
                    <!--List of stations buttons-->
                   <div class="divStations-btn">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="document.location='stationA.php' ">Station A</button>
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="document.location='stationB.php' ">Station B</button>
                  </div><br>
                  <!-- printableTable -->
                  <input class="btn btn-primary" type="button" onclick="printDiv('printableTable')" value= "Print this page" /><br>

                    <?php
                      include "db_connect.php";
                      $mysqli=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
                      // Check connection
                      if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }

                      $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table  ORDER BY date DESC");
                      $Sfname =  "";
                      $Slname = "";
                      $QRcode = "";
                    ?>
                    <div id ="printableTable" style="overflow-x: auto;">
                      <table class="table table-bordered" id = "tableId">
                        
                        <?php 
                        include 'stationslistTable.php' 
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
                      //Auto generate report after clicking button========================================================================
                      
                      var class_users = document.getElementsByClassName("redirectPage");
                      //pass array from php array to JS(object)
                      const users_obj = <?php echo json_encode($temparray); ?>;
                      const users_arr = Object.entries(users_obj);
                      
                      console.log(typeof users_arr);
                      console.log("users_arr contain: ", users_arr);
                      //object to array
                      // const toArray = Object.entries(obj); 
                      // console.log("typeof toArray: ", toArray);
                      
                      function printAlert(qrcode, firstname, lastname, station, date, time, bht){
                        qr = "QRcode: ", qrcode;
                        fullname = "User Name: ", firstname + " " + lastname;
                        station = "Station: ", station;
                        date = "Date: ", date;
                        time = "Time: ", time;
                        bht = "Body Heat Temperature", bht;
                        let alertString = qr + fullname + "\n" + station + "\n" + date + "\n" + time + "\n" + bht;
                        return alertString;
                      }
                      
                      //onclick row v1 ================================================================================
                      // for (var i=0; i < class_users.length; i++) {
                      //   class_users[i].onclick = function(){
                      //     let numSelected = i;
                      //     console.log(numSelected);
                      //     // const selectedUser = Object.entries(users_obj[i]);
                      //     // console.log("typeof selectedUser: ", typeof selectedUser);
                      //     // console.log("selectedUser content: ", selectedUser);

                      //     let text = "generate report that is near to this user?\n";
                      //     // let text2 = printAlert(users_obj[i][0], users_obj[i][1], users_obj[2], users_obj[i][5], users_obj[i][7], users_obj[i][8], users_obj[i][9]);
                      //     let alertString = text;
                          
                      //     if (confirm(alertString) == true) {
                      //       window.open(
                      //         "genReport.php", "_blank");
                      //     } else {
                      //       // text = "You canceled!";
                      //     }
                      //         // alert("generate report that is near to this user?");
                      //     }
                      // }
                      //==========
                      //onclick row v2 test================================================================================
                      function addRowHandlers() {
                        var table = document.getElementById("tableId");
                        var rows = table.getElementsByTagName("tr");
                        for (i = 0; i < rows.length; i++) {
                          var currentRow = table.rows[i];
                          var createClickHandler = function(row) {
                            return function() {
                              var cell = row.getElementsByTagName("td")[0];
                              var cell1 = row.getElementsByTagName("td")[1];
                              var cell2 = row.getElementsByTagName("td")[2];
                              var cell3 = row.getElementsByTagName("td")[3];
                              var cell4 = row.getElementsByTagName("td")[4];
                              var cell5 = row.getElementsByTagName("td")[5];
                              var cell6 = row.getElementsByTagName("td")[6];
                              var cell7 = row.getElementsByTagName("td")[7];
                              var cell8 = row.getElementsByTagName("td")[8];
                              var cell9 = row.getElementsByTagName("td")[9];

                              var string0 = cell.innerHTML;
                              var string1 = cell1.innerHTML;
                              var string2 = cell2.innerHTML;
                              var string3 = cell3.innerHTML;
                              var string4 = cell4.innerHTML;
                              var string5 = cell5.innerHTML;
                              var string6 = cell6.innerHTML;
                              var string7 = cell7.innerHTML;
                              var string8 = cell8.innerHTML;
                              var string9 = cell9.innerHTML;


                              // var string1 = cell5.innerHTML;
                              var id = cell.innerHTML;
                              // alert("id:" + id); //orig
                              const selectedUser = [string0, string1, string2, string3, string4, string5, string6, string7, string8, string9];
                              console.log("typeof selectedUser: ", typeof selectedUser);
                              console.log("content of selectedUser: ", selectedUser);
                              let text = "generate report that is near to this user?\n";
                              alert(":" + string1);

                            };
                          };
                          currentRow.onclick = createClickHandler(currentRow);
                        }
                      }
                      window.onload = addRowHandlers();

                    </script>
</main>
  </body>
</html>