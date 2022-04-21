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
        // header("Location: adminlogin.php");

		//test 
		echo var_dump($_SESSION['QRcode']);
		echo "<br> user data <br>";
		echo var_dump($user_data);

		echo "<br> row<br>";
		echo var_dump($row);
        die;
    }
}


?>