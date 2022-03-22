<?php

function check_login($con)
// QRcode will be used as a user id 
    if(isset($_SESSION['QRcode']))
    {
        $id = $_SESSION['QRcode'];
        $query = "SELECT * FROM Allusers_table WHERE QRcode = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_aassoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: adminlogin.php");
    die;
?>