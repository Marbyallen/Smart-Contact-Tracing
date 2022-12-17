<!DOCTYPE html>
<html lang="en-US">
    <head>
    <link rel="stylesheet" type="text/css" href="\assets_admin\mymain1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>GenerateReport</title>
    </head>
<body>
<table class="table table-bordered" id = "tableId">
<?php
    include "db_connect.php";
    $mysqli=mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // SELECT * FROM usersAndStations_table 
    // WHERE 
    // station LIKE 'B' AND
    // date IN ('2022-11-24') AND 
    // time BETWEEN '12:31:22' AND '14:31:22'
    // ORDER BY time DESC;
    // $time1 = $_POST["time1"];
    // $station = $date1 = $time1 = $time2 = $time3 = "";
    $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table station LIKE '".$station."' AND date IN ('".$date1."') AND time BETWEEN '".$time2."' AND '".$time3."'  ORDER BY date DESC");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $station = test_input($_REQUEST["station"]);
        $date1 = test_input($_REQUEST["date1"]);
        $time1 = test_input($_REQUEST["time1"]);
        $time2 = test_input($_REQUEST["time2"]);
        $time3 = test_input($_REQUEST["time3"]);

        echo "time1 value: " . $time1;
        echo "<br>";
        echo "time2 value: " . $time2;
        echo "<br>";
        echo "time3 value: " . $time3;
        echo "<br>";

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
        $numResults = mysqli_num_rows($result);
        echo "Number of rows found: " . $numResults;
        while($row = mysqli_fetch_array($result))
        { 
            array_push($temparray,$row);                  
            echo "<tr class = " . $class . ">";
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

    //method 2 test
        // $time2 = $_REQUEST["time2"];
        // $time3 = $_REQUEST["time3"];
        // $station = $_REQUEST["station"];
        // $date1 = $_REQUEST["date1"];
        // $class = "redirectPage";
        // $temparray = array();

        // echo "
        //     <tr>
        //     <th>QR code</th>
        //     <th>First Name</th>
        //     <th>Last Name</th>
        //     <th>Contact No.</th>
        //     <th>Email Address</th>
        //     <th>Station</th>
        //     <th>Facial recognition image</th>
        //     <th>Date</th>
        //     <th>Time</th>
        //     <th>Body Heat Temperature</th>
        //     </tr>
        // ";
        
        // $numResults = mysqli_num_rows($result);
        // echo "Number of rows found: " . $numResults;
        // while($row = mysqli_fetch_array($result))
        // { 
        //     array_push($temparray,$row);                  
        //     echo "<tr class = " . $class . ">";
        //     echo "<td>" . $row['QRcode'] . "</td>";
        //     echo "<td>" . $row['firstname'] . "</td>";
        //     echo "<td>" . $row['lastname'] . "</td>";
        //     echo "<td>" . $row['contactno'] . "</td>";
        //     echo "<td>" . $row['email'] . "</td>";
        //     echo "<td>" . $row['station'] . "</td>";
        //     echo "<td>" . $row['facialimg'] . "</td>";
        //     echo "<td>" . $row['date'] . "</td>";
        //     echo "<td>" . $row['time'] . "</td>";
        //     echo "<td>" . $row['bodyheat_temp'] . "</td>";
        //     echo "</tr>";
        // }
        // echo "</table>";
        // mysqli_close($mysqli);
    //
            

?>
</body>
</html>