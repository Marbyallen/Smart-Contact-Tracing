<?php 
// include('server.php');
session_start();
include("connection.php");
include("function.php");
$errors   = array();
$success   = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $_SESSION['userName'] = $_POST['userName'];

    $result = mysqli_query($con," SELECT  * FROM Allusers_table WHERE username LIKE '".$userName."' LIMIT 1");
    if($row = mysqli_fetch_array($result)){
        // echo "username found from db: " . $userName . "<br>";
        
        if($row['password'] === $userPassword){
            echo "password found also";
            $user_data = mysqli_fetch_assoc($row);
            $_SESSION['QRcode'] = $row['QRcode'];
            header("Location: dashboard.php");
        } else {
            // echo "wrong password";
            array_push($errors, "Wrong username or password");
        }
    } else {
    //    echo "username not found <br> ";
    array_push($errors, "Wrong username or password");
    }
    }
 ?>
<!DOCTYPE html>
<head>
</head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Log In</title>
</head>
<body>
    <div class="wrapper">
        <div class="registration">
            <h1>Log In to Tracing Connections</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<?php include('errors.php') ?>
                <div class="user-detail">
                    <div class="inputs">
                        <h3 class="details">Username</h3>
                        <input type="text" name="userName" placeholder="Username" required>
                    </div>
                    <div class="inputs">
                        <h3 class="details">Password</h3>
                        <input type="password" name="userPassword" placeholder="Password" required>
                    </div>
                    
                    <div class="submit">
						<button type="submit" class="btn" name="login_user">Login</button>
					</div>
                </div>
            </form>
            <div class="member">
                <p>Not yet a member? <a href="register.php">Sign Up</a></p>
            </div>
        </div>
        
    </div>
    
</body>
</html>