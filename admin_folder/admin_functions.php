<?php

function check_login($con)
{
	if(isset($_SESSION['QRcode']))
	{
		$id = $_SESSION['QRcode'];
		$query = "SELECT * FROM admin_table WHERE QRcode LIKE  '".$id."' LIMIT 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	} else {
        //redirect to login
		echo var_dump($_SESSION['QRcode']);
        // header("Location: adminlogin.php");
        die;
    }
}


?>