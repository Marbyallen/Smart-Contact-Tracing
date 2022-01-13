<!DOCTYPE html>
<html lang="en-US">
          <head> 
            <link rel="stylesheet" type="text/css" href="\assets_admin\mymain1.css">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <title>Station A</title>
                    
          </head>
          <body>
                   <div class="sidenav">
                    <ul class="first">
                              <li> <a href="hadmin.html">Home</a></li>
                              <li> <a href="registeredUsers.html">Users List</a></li>
                              <li><a href="stationslist.html">Stations List</a></li>
                              <li style="float: right;"> <a href="index.html">Logout</a></li>
                    </ul>
                   </div>

                   <main>
                    <h1>Station A</h1>
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="document.location='stationslist.php' "> Back </button>
                    <!--Form-->
                    <h3>Search</h3>  
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="row"><br>
                                <div class="col-md-4">
                                    <input id="fname" name="Sfname" type="text" placeholder="First Name" class="form-control input-md"><br>
                                    <button type="submit" class="btn btn-primary" >Search</button>      
                                </div>
                                            
                                <div class="col-md-4">
                                    <input id="lname" name="Slname" type="text" placeholder="Last Name" class="form-control input-md"><br>
                                    
                                </div>

                                <div class="col-md-4">
                                    <input id="qrcode" name="QRcode" type="text" placeholder="QR code" class="form-control input-md"><br>
                                    
                                </div><br>
                        </div><br>
                        <!-- Date input -->
                                <div class="col-md-4">
                                    <label>Date:</label>
                                    <input type="date" class="form-control" placeholder="Start"  name="date1">
                                    </div>
                                    <div class="col-md-4">
                                    <label>To</label>
                                    <input type="date" class="form-control" placeholder="End"  name="date2">
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span>Search</button> 
                                    <a href="stationA.php" type="button" class="btn btn-primary"><span class = "glyphicon glyphicon-refresh"><span>Refresh</a>
                                
                                </form>
                        <!-- Display Table -->
                        <?php
                    include "db_connect.php";
                    $mysqli=mysqli_connect("$host","$username","$user_pass","$database_in_use");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $result = mysqli_query($mysqli," SELECT  * FROM stationA_complete");
                    $Sfname =  "";
                    $Slname = "";
                    $QRcode = "";
                    ?>
              <table class="table table-bordered">
                        <tr>
                                  <th>QR code</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Contact No.</th>
                                  <th>Email Address</th>
                                  <th>Station</th>
                                  <th>Facial recognition image</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Body Heat Temperature</th>
                        </tr>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                  // collect value of input field
                                  $Sfname = $_REQUEST['Sfname'];
                                  $Slname = $_REQUEST['Slname'];
                                  $QRcode = $_REQUEST['QRcode'];
                                  $date1 = $_REQUEST['date1'];
                                  $date2 = $_REQUEST['date2'];
                                  if (!empty($Sfname)) {
                                            $result = mysqli_query($mysqli," SELECT  * FROM stationA_complete WHERE firstname LIKE '".$Sfname."' ");
                                                      while($row = mysqli_fetch_array($result))
                                                                {
                                                                    // station facialimg date time bodyheat_temp
                                                                echo "<tr>";
                                                                echo "<td>" . $row['QRcode'] . "</td>";
                                                                echo "<td>" . $row['firstname'] . "</td>";
                                                                echo "<td>" . $row['lastname'] . "</td>";
                                                                echo "<td>" . $row['contactno'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";
                                                                echo "<td>" . $row['station'] . "</td>";
                                                                echo "<td>" . $row['facialimg'] . "</td>";
                                                                echo "<td>" . $row['date'] . "</td>";
                                                                echo "<td>" . $row['time'] . "</td>";
                                                                echo "<td>" . $row['bodyheat_temp'] . "</td>";
                                                                echo "</tr>";
                                                                }
                                            echo "</table>";
                                            mysqli_close($mysqli);
                                  } elseif(!empty($Slname)) {
                                            
                                            $result = mysqli_query($mysqli," SELECT  * FROM stationA_complete WHERE lastname = '".$Slname."' ");
                                                      while($row = mysqli_fetch_array($result))
                                                      {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['QRcode'] . "</td>";
                                                                echo "<td>" . $row['firstname'] . "</td>";
                                                                echo "<td>" . $row['lastname'] . "</td>";
                                                                echo "<td>" . $row['contactno'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";
                                                                echo "<td>" . $row['station'] . "</td>";
                                                                echo "<td>" . $row['facialimg'] . "</td>";
                                                                echo "<td>" . $row['date'] . "</td>";
                                                                echo "<td>" . $row['time'] . "</td>";
                                                                echo "<td>" . $row['bodyheat_temp'] . "</td>";
                                                                echo "</tr>";
                                                      }
                                                      echo "</table>";
                                                      mysqli_close($mysqli);

                                 } elseif(!empty($QRcode)){
                                    $result = mysqli_query($mysqli," SELECT  * FROM stationA_complete WHERE QRcode = '".$QRcode."' ");
                                                        while($row = mysqli_fetch_array($result))
                                                        {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['QRcode'] . "</td>";
                                                                echo "<td>" . $row['firstname'] . "</td>";
                                                                echo "<td>" . $row['lastname'] . "</td>";
                                                                echo "<td>" . $row['contactno'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";
                                                                echo "<td>" . $row['station'] . "</td>";
                                                                echo "<td>" . $row['facialimg'] . "</td>";
                                                                echo "<td>" . $row['date'] . "</td>";
                                                                echo "<td>" . $row['time'] . "</td>";
                                                                echo "<td>" . $row['bodyheat_temp'] . "</td>";
                                                                echo "</tr>";
                                                        }
                                                        echo "</table>";
                                                        mysqli_close($mysqli);
                                  } elseif(!empty($date1) && !empty($date2)){
                                    $result = mysqli_query($mysqli, "SELECT * FROM `stationA_complete` WHERE `date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
                                    while($row = mysqli_fetch_array($result))
                                    {
                                            echo "<tr>";
                                            echo "<td>" . $row['QRcode'] . "</td>";
                                            echo "<td>" . $row['firstname'] . "</td>";
                                            echo "<td>" . $row['lastname'] . "</td>";
                                            echo "<td>" . $row['contactno'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['station'] . "</td>";
                                            echo "<td>" . $row['facialimg'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>" . $row['time'] . "</td>";
                                            echo "<td>" . $row['bodyheat_temp'] . "</td>";
                                            echo "</tr>";
                                    }
                                    echo "</table>";
                                    mysqli_close($mysqli);
                                  } else {
                                    while($row = mysqli_fetch_array($result))
                                    {
                                              echo "<tr>";
                                              echo "<td>" . $row['QRcode'] . "</td>";
                                              echo "<td>" . $row['firstname'] . "</td>";
                                              echo "<td>" . $row['lastname'] . "</td>";
                                              echo "<td>" . $row['contactno'] . "</td>";
                                              echo "<td>" . $row['email'] . "</td>";
                                              echo "<td>" . $row['station'] . "</td>";
                                              echo "<td>" . $row['facialimg'] . "</td>";
                                              echo "<td>" . $row['date'] . "</td>";
                                              echo "<td>" . $row['time'] . "</td>";
                                              echo "<td>" . $row['bodyheat_temp'] . "</td>";
                                              echo "</tr>";
                                    }
                                    echo "</table>";
                                    mysqli_close($mysqli);
                                    }
                        }
                        ?>
                    </main>
                   
                   
                    
                              
          </body>
</html>