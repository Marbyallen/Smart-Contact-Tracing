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
                      <table class="table table-bordered">
                        
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
                      const selectedUser = Object.entries(users_obj[0]);
                      console.log("typeof selectedUser: ", typeof selectedUser);
                      console.log("selectedUser content: ", selectedUser);
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
                      
                      
                      for (var i=0; i < class_users.length; i++) {
                        class_users[i].onclick = function(){
                          // const selectedUser = 
                          let text = "generate report that is near to this user?\n";
                          let text2 = printAlert(users_obj[i][0], users_obj[i][1], users_obj[2], users_obj[i][5], users_obj[i][7], users_obj[i][8], users_obj[i][9]);
                          let alertString = text + text2;
                          
                          if (confirm(alertString) == true) {
                            window.open(
                              "genReport.php", "_blank");
                          } else {
                            // text = "You canceled!";
                          }
                              // alert("generate report that is near to this user?");
                          }
                      }


                    </script>
</main>
  </body>
</html>