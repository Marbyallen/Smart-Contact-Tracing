<?php
function check_login($con)
{
	if(isset($_SESSION['QRcode']))
	{
		$id = $_SESSION['QRcode'];
		$query = "SELECT * FROM Allusers_table WHERE QRcode LIKE  '".$id."' LIMIT 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

            $result = mysqli_query($con," SELECT  * FROM Allusers_table WHERE username LIKE '".$userName."' LIMIT 1");
            $row = mysqli_fetch_array($result);
            $user_data = mysqli_fetch_assoc($row);

			// $user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	} else {
        //redirect to login
        header("Location: adminlogin.php");
        die;
    }
}