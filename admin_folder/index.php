

<!-- session_start();

  include("db_connect.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username))
    {

      
      //read from db
      $query = "SELECT * FROM Allusers_table WHERE username = '$username' limit 1 ";
      $result = mysqli_query($mysqli, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_aassoc($result);

          if($user_data['password'] === $password)
          {

            $_SESSION['QRcode'] = $user_data['QRcode'];
            header("Location: hadmin.html");
            die;
          }
        }
      }

      echo "wrong username or password!";
    }else
  {
    echo"wrong username or password!";
  }
  } -->


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
                <!-- <li class="topmenu"><a href="loginhadmin.php" target="_self">Login as Head Admin</a></li> -->
              </ul>
            </header>
            <main>

              <h2>Login as Admin</h2>
              <form method="post">
                <div class="form-group">
                <label>Username</label>
                <input type="text" name="username">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
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