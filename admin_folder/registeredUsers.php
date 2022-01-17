<!DOCTYPE html>
<html lang="en-US">
          <head> 
            <link rel="stylesheet" type="text/css" href="\assets_admin\mymain1.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Registered Users</title>
          </head>
          <body>
                   
                    <div class="sidenav">
                    <ul class="first">
                              <li> <a href="hadmin.html">Home</a></li>
                              <li> <a class="active" href="registeredUsers.php">Users List</a></li>
                              <li> <a href="adminslist.php">Admins List</a></li>
                              <li><a href="stationslist.php">Stations List</a></li>
                              <li style="float: right"> <a href="index.html">Logout</a></li>
                    </ul>
                   </div>

                   <main>
                    <h1>Users List</h1>
                              <label for="textinput">Search Name</label>  
                                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                            <div class="row"><br>
                                                <div class="col-md-4">
                                                    <input id="fname" name="Sfname" type="text" placeholder="First Name" class="form-control input-md"><br>   
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="lname" name="Slname" type="text" placeholder="Last Name" class="form-control input-md"><br>
                                                </div>
                                            <button type="submit" class="btn btn-primary" >Search</button>
                                            </div>
                                        </form><br>
                    <?php
                    include "db_connect.php";
                    $mysqli=mysqli_connect("$host","$username","$user_pass","$database_in_use");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $result = mysqli_query($mysqli," SELECT  * FROM customers_table");
                    $Sfname =  "";
                    $Slname = "";
                    ?>
                    <table>
                              <tr>
                                        <th>QR code</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Contact No.</th>
                                        <th>Email Address</th>
                                        <th>Address</th>
                              </tr>
                              <!-- search first name -->
                              <?php
                              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // collect value of input field
                                        $Sfname = $_REQUEST['Sfname'];
                                        $Slname = $_REQUEST['Slname'];
                                        if (!empty($Sfname)) {
                                                  $result = mysqli_query($mysqli," SELECT  * FROM customers_table WHERE firstname LIKE '".$Sfname."' ");
                                                            while($row = mysqli_fetch_array($result))
                                                                      {
                                                                      echo "<tr>";
                                                                      echo "<td>" . $row['QRcode'] . "</td>";
                                                                      echo "<td>" . $row['firstname'] . "</td>";
                                                                      echo "<td>" . $row['lastname'] . "</td>";
                                                                      echo "<td>" . $row['contactno'] . "</td>";
                                                                      echo "<td>" . $row['email'] . "</td>";
                                                                      echo "<td>" . $row['address'] . "</td>";
                                                                      echo "</tr>";
                                                                      }
                                                  echo "</table>";
                                                  mysqli_close($mysqli);
                                        } elseif(!empty($Slname)) {
                                                  
                                                  $result = mysqli_query($mysqli," SELECT  * FROM customers_table WHERE lastname = '".$Slname."' ");
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                                      echo "<tr>";
                                                                      echo "<td>" . $row['QRcode'] . "</td>";
                                                                      echo "<td>" . $row['firstname'] . "</td>";
                                                                      echo "<td>" . $row['lastname'] . "</td>";
                                                                      echo "<td>" . $row['contactno'] . "</td>";
                                                                      echo "<td>" . $row['email'] . "</td>";
                                                                      echo "<td>" . $row['address'] . "</td>";
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
                                                                      echo "<td>" . $row['address'] . "</td>";
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