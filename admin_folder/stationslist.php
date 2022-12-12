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
                    <!-- toggle switch
                    <div id="toggle-switch">
                      <button id="myBtn" onclick="toggle()">OFF</button>
                    </div> -->
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
                      var obj = <?php echo json_encode($temparray); ?>;
                      //object to array
                      const toArray = Object.entries(obj); 
                      console.log("typeof toArray: ", toArray);
                      
                      var userArray = [];
                      
                      for (var i=0; i < class_users.length; i++) {
                        class_users[i].onclick = function(){
                          let text = "generate report that is near to this user?\n";
                          let user = obj[i][1];
                          let alertString = text + user;
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