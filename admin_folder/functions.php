<?php

function check_login($mysqli)
// QRcode will be used as a user id 
    if(isset($_SESSION['QRcode']))
    {
        $id = $_SESSION['QRcode'];
        $query = "SELECT * FROM Allusers_table WHERE QRcode = '$id' limit 1";

        $result = mysqli_query($mysqli,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_aassoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: index.php");
    die;

    //<?php

// session_start();

//   include("db_connect.php");
//   include("functions.php");

//   if($_SERVER['REQUEST_METHOD'] == 'POST')
//   {
//     //something was posted
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     if(!empty($username) && !empty($password) && !is_numeric($username))
//     {

      
//       //read from db
//       $query = "SELECT * FROM Allusers_table WHERE username = '$username' limit 1 ";
//       $result = mysqli_query($mysqli, $query);

//       if($result)
//       {
//         if($result && mysqli_num_rows($result) > 0)
//         {
//           $user_data = mysqli_fetch_aassoc($result);

//           if($user_data['password'] === $password)
//           {

//             $_SESSION['QRcode'] = $user_data['QRcode'];
//             header("Location: hadmin.html");
//             die;
//           }
//         }
//       }

//       echo "wrong username or password!";
//     }else
//   {
//     echo"wrong username or password!";
//   }
//   }

//end of php

?>

