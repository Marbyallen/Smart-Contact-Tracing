<?php
session_start();
include("db_connect.php");
include("admin_functions.php");

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_SESSION['userName'] = $_POST['userName'];
      $userName = $_POST['userName'];
      $userPassword = $_POST['userPassword'];


      $result = mysqli_query($con," SELECT  * FROM admin_table WHERE username LIKE '".$userName."' LIMIT 1");
      if($row = mysqli_fetch_array($result)){
          echo "username found from db: " . $userName . "<br>";
          $_SESSION['QRcode'] = $row['QRcode'];
          var_dump($_SESSION['QRcode']);
          if($row['password'] === $userPassword){
              echo "password found also";
              $user_data = mysqli_fetch_assoc($row);
              $_SESSION['QRcode'] = $row['QRcode'];
              header("Location: index.php");
          } else {
              echo "wrong password";
          }
          } else {
          echo "username not found <br> ";
      }
  }

    //testing
    $t_username = "Hady";
    $t_password = "grana21";

    $testQuery = mysqli_query($con," SELECT  * FROM admin_table WHERE username LIKE '".$t_username."' LIMIT 1");
    if($row = mysqli_fetch_array($testQuery)){
      echo "username found from db: " . $t_username . "<br>";
      $_SESSION['QRcode'] = $row['QRcode'];
      var_dump($_SESSION['QRcode']);

        if($row['password'] === $t_password){
            echo "<br>password found also";
            $user_data = mysqli_fetch_assoc($row);
            $_SESSION['QRcode'] = $row['QRcode'];
            echo "<br>";
            echo var_dump($_SESSION['QRcode']);

            $id = $_SESSION['QRcode'];
        echo "<br>id = ". var_dump($id);
        $testQuery2 = "SELECT * FROM admin_table WHERE QRcode LIKE  '".$id."' LIMIT 1";
        
        $t_result = mysqli_query($con,$testQuery2);

          if($result && mysqli_num_rows($result) > 0)
          {
            $user_data = mysqli_fetch_assoc($result);
            echo "<br>user data: " . var_dump($user_data);
            return $user_data;
          }

        } else {
            echo "wrong password";
        }
      } else {
      echo "username not found <br> ";
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="\assets_admin\mymain1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          </head>
          <body>
            <header>
              <ul>
                <li><h1 id="titlemain" >Smart Contact Tracing</h1></li>
              </ul>
            </header>
            <main>

              <h2>Login as Admin</h2>
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
                <label>Username</label>
                <input type="text" name="userName" 
                required autofocus autocomplete = "off">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" name="userPassword">
                <br>
                <button type="submit" class="btn btn-primary" value="Login">Login</button>
                </div>
              </form>
            </main>
            <footer>
              <p>Page created by Smart Contact Tracing team</p>
            </footer>
          </body>
</html>