<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $Sfname = $_REQUEST['Sfname'];
            $Slname = $_REQUEST['Slname'];
            $QRcode = $_REQUEST['QRcode'];
            $date1 = $_REQUEST['date1'];
            $date2 = $_REQUEST['date2'];
            if (!empty($Sfname)) {
                      $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE firstname LIKE '".$Sfname."' ");
                                $row = mysqli_fetch_array($result))
                                $total = $row[0];
                                echo 'results found: $total';
                      mysqli_close($mysqli);
            } elseif(!empty($Slname)) {
                      $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE lastname = '".$Slname."' ");
                                $row = mysqli_fetch_array($result))
                                $total = $row[0];
                                echo 'results found: $total';
                                mysqli_close($mysqli);

           } elseif(!empty($QRcode)){
              $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE QRcode = '".$QRcode."' ");
                                $row = mysqli_fetch_array($result))
                                $total = $row[0];
                                echo 'results found: $total';
                                mysqli_close($mysqli);
          //-----------------------date range filter
            } elseif(!empty($date1) && !empty($date2)){
              $result = mysqli_query($mysqli, "SELECT * FROM `usersAndStations_table` WHERE `date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
              $row = mysqli_fetch_array($result))
                                $total = $row[0];
                                echo 'results found: $total';
              mysqli_close($mysqli);
            } else {
                $row = mysqli_fetch_array($result))
                $total = $row[0];
                echo 'results found: $total';
              mysqli_close($mysqli);
              }
  }

?>