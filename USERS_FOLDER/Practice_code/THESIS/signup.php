<?php 
session_start();

	include("connection.php");
	include("functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($username))
		{

			//save to database
            /*
			$user_id = random_num(20);
            */
			$query = "insert into register (user_id,user_name,password) values ('$user_id','$username','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css\signup.css">
    <title>THESIS</title>
</head>
<body>
  <div class="wrapper">
        
  <div class="registration">
      <h1>REGISTRATION</h1>
      <form action="post">
          <div class="user-detail">
            <div class="inputs">
                <h3 class="details">Username</h3>
                <input type="Username" name="Username" placeholder="Username"= "6" required>
            </div> 
            <div class="inputs">
                <h3 class="details">Password</h3>
                <input type="password" name="Password" placeholder="Password" minlength = "6" required>
            </div>  
              <div class="inputs">
                  <h3 class="details">First name</h3>
                  <input type="text" name="First name" placeholder="Firstname" required>
              </div>
              <div class="inputs">
                  <h3 class="details">Last name</h3>
                  <input type="text" name="Last name" placeholder="Last name" required>
              </div>
              <div class="input">
                <h3 class="gender-title">Gender</h3>
                <div class="category">  
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="male" checked>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="female">
                </div>
            </div>
            <div class="inputs">
                <h3 class="details">Contact Number</h3>
                <input type="tel" id="Phone" placeholder="+63" minlength = "10" required>
            </div>
            <div class="inputs">
                  <h3 class="details">Email</h3>
                  <input type="email" email="email" placeholder="Email" required>
            </div>
            <div class="inputs">
                <h3 class="details">Address</Address></h3>
                <input type="text" name="Address" placeholder="Address" required>
            </div>
              <div class="submit">
                  <button>Register</button>
              </div>
          </div>

      </form>
  </div>
</div>
</body>
</html>