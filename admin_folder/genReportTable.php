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

    $time2 = $_REQUEST["time2"];
    $time3 = $_REQUEST["time3"];
    echo "time1 value: " . $time1;
    echo "<br>";
    echo "time2 value: " . $time2;
    echo "<br>";
    echo "time3 value: " . $time3;
    echo "<br>";
    $station = $_POST["station"];
    $date1 = $_POST["date1"];
    $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table station LIKE '$station' AND date IN ('$date') AND time BETWEEN 'time2' AND 'time3'  ORDER BY date DESC");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $station = $_REQUEST['station'];
        // $date1 = $_REQUEST['date1'];

        // $time2 = $_POST["time2"];
        // $time3 = $_POST["time3"];
        // echo "time1 value: " . $time1;
        // echo "<br>";
        // echo "time2 value: " . $time2;
        // echo "<br>";
        // echo "time3 value: " . $time3;
        // echo "<br>";
        // $station = $_POST["station"];
        // $date1 = $_POST["date1"];

        $class = "redirectPage";
        $temparray = array();

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
            $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE firstname LIKE '".$Sfname."' ");
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
            $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE lastname = '".$Slname."' ");
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
            $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE QRcode = '".$QRcode."' ");
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
        //-----------------------date range filter
            
        } elseif(!empty($date1) && !empty($date2)){
        $result = mysqli_query($mysqli, "SELECT * FROM `usersAndStations_table` WHERE `date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
        $numResults = mysqli_num_rows($result);
        echo "Number of rows found: " . $numResults;
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr data-href = 'https://www.google.com/'>";
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
        // echo json_encode($temparray);
    }


    

?>