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
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <title>Station B</title>
            
    </head>
        <body>
            <div class="sidenav">
            <ul class="first">
                        <li> <a href="index.php">Home</a></li>
                        <li> <a href="registeredUsers.php">Users List</a></li>
                        <li> <a href="adminslist.php">Admins List</a></li>
                        <li><a href="stationslist.php">Stations List</a></li>
                        <li style="float: right;"> <a href="logout.php">Logout</a></li>
            </ul>
            </div>
            <main>
                <h1>Station B</h1>
                <label for="">You can search their Name here or QR code</label>  
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
                        <!-- printableTable -->
                        <input class="btn btn-primary" type="button" onclick="printDiv('printableTable')" value= "Print this page" /><br>
                  
                    </form> <br>
                        <!-- Display Table -->
                        <?php
                        include "db_connect.php";
                        $mysqli=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
                        // Check connection
                        if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $result = mysqli_query($mysqli," SELECT  * FROM stationB_complete");
                        $Sfname =  "";
                        $Slname = "";
                        $QRcode = "";
                    ?>
                    <div id = "printableTable" style="overflow-x: auto;">
                        <table class="table table-bordered">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // collect value of input field
                                $Sfname = $_REQUEST['Sfname'];
                                $Slname = $_REQUEST['Slname'];
                                $QRcode = $_REQUEST['QRcode'];
                                $date1 = $_REQUEST['date1'];
                                $date2 = $_REQUEST['date2'];
                                echo "
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
                                ";
                            if (!empty($Sfname)) {
                                $result = mysqli_query($mysqli," SELECT  * FROM stationB_complete WHERE firstname LIKE '".$Sfname."' ");
                                $numResults = mysqli_num_rows($result);
                                echo "Number of rows found: " . $numResults;          
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
                                    $result = mysqli_query($mysqli," SELECT  * FROM stationB_complete WHERE lastname = '".$Slname."' ");
                                    $numResults = mysqli_num_rows($result);
                                    echo "Number of rows found: " . $numResults;
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
                            $result = mysqli_query($mysqli," SELECT  * FROM stationB_complete WHERE QRcode = '".$QRcode."' ");
                            $numResults = mysqli_num_rows($result);
                            echo "Number of rows found: " . $numResults;
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
                                $result = mysqli_query($mysqli, "SELECT * FROM `stationB_complete` WHERE `date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
                                $numResults = mysqli_num_rows($result);
                                echo "Number of rows found: " . $numResults;
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
                            $numResults = mysqli_num_rows($result);
                            echo "Number of rows found: " . $numResults;
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
                    </div>

                    <script>
                        function printDiv(printableTable){
                        var printContents = document.getElementById(printableTable).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                        }

                        //Auto refresh table
                        //TODO: Xaxis should not move after reload page

                      let fname = <?php echo json_encode($Sfname); ?>;
                      let lname = <?php echo json_encode($Slname); ?>;
                      let QRcode = <?php echo json_encode($QRcode); ?>;
                      let date1 = <?php echo json_encode($date1); ?>;
                      let date2 = <?php echo json_encode($date2); ?>;
                      // let toggle = <?php echo json_encode($toggle); ?>;

                        function setCookie(user_input, value, days) {
                        var expires = "";
                            if (days) {
                                var date = new Date();
                                date.setTime(date.getTime() + (days*24*60*60*1000));
                                expires = "; expires=" + date.toUTCString();
                            }
                        }
                        function getCookie(user_input) {
                            var nameEQ = user_input + "=";
                            var ca = document.cookie.split(';');
                            for(var i=0;i < ca.length;i++) {
                                var c = ca[i];
                                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                            }
                            return null;
                        }

                      setCookie("first_name", fname,30);
                      setCookie("last_name", lname,30);
                      setCookie("user_qrcode", QRcode,30);
                      setCookie("user_date1", date1,30);
                      setCookie("user_date2", date2,30);
                      // setCookie("toggle_switch", toggle,30);
                      var userFirstname=getCookie("first_name");
                      var userFirstname=getCookie("last_name");
                      var userFirstname=getCookie("user_qrcode");
                      var userFirstname=getCookie("user_date1");
                      var userFirstname=getCookie("user_date2");
                      // var userFirstname=getCookie("toggle_switch");

                      //fix scroll
                      document.addEventListener("DOMContentLoaded", function(event) { 
                        var scrollpos = localStorage.getItem('scrollpos');
                        if (scrollpos) window.scrollTo(0, scrollpos);
                      }); 

                      window.onbeforeunload = function(e) {
                          localStorage.setItem('scrollpos', window.scrollY, window.scrollX);
                      };
                      // Phase 2 refresh
                      // REFRESH LOOP~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                      setTimeout(() => {
                          document.location.reload(true);
                          console.log("setTimeout is called");
                      }, 5000);

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
                              alert("generate report that is near to this user?");
                          }
                      }
                  </script>
                              
            </main>
                   
                   
                    
                              
          </body>
</html>