<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="sample1.css">
    <link rel="stylesheet" href="bootstrap-grid.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="row"><br>
                <div class="col-md-4">
                <label>Username</label>
                    <input id="fname" name="Iusername" type="text" class="form-control input-md" value="<?php echo $Iusername; ?>"><br>
                </div>
                
                <div class="col-md-4">
                  <label>Password</label>
                    <input id="lname" name="Ipassword" type="text" class="form-control input-md" value="<?php echo $Iusername; ?>"><br>
                </div><br>
          </div>
          <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
      </form><br>

          <?php
                    include "db_connect.php";
                    $mysqli=mysqli_connect("$host","$username","$user_pass","$database_in_use");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($mysqli," SELECT  * FROM date_timesample");
                    //Register
                    if (isset($_POST['reg_user'])) {
                              // receive all input values from the form
                              $Iusername = mysqli_real_escape_string($mysqli, $_POST['username']);
                              $Ipassword = mysqli_real_escape_string($mysqli, $_POST['password']);
                            
                              // form validation: ensure that the form is correctly filled ...
                              // by adding (array_push()) corresponding error unto $errors array
                              if (empty($Iusername)) { array_push($errors, "Username is required"); }
                              if (empty($Ipassword)) { array_push($errors, "Password is required"); }
                            
                              // first check the database to make sure 
                              // a user does not already exist with the same username and/or email
                              $user_check_query = "SELECT * FROM date_timesample WHERE username='".$Iusername."' ";
                              $result = mysqli_query($mysqli, $user_check_query);
                              $user = mysqli_fetch_assoc($result);
                              
                              if ($user) { // if user exists
                                if ($user['username'] === $Iusername) {
                                  array_push($errors, "Username already exists");
                                }
                              }
                            
                              // Finally, register user if there are no errors in the form
                              if (count($errors) == 0) {
                                        $password = md5($Ipassword);//encrypt the password before saving in the database
                            
                                        $query = "INSERT INTO date_timesample (username, password) 
                                                              VALUES('".$Iusername."', '".$email."', '".$Ipassword."')";
                                        mysqli_query($mysqli, $query);
                                        $_SESSION['username'] = $Iusername;
                                        $_SESSION['success'] = "You are now logged in";
                              }
                            }
                    
          ?>
          <table>
                    <tr>
                              <th>id</th>
                              <th>date</th>
                              <th>time</th>
                              <th>username</th>
                              <th>password</th>
                    </tr>
                    <?php
                              while($row = mysqli_fetch_array($result))
                              {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                        echo "</tr>";
                              }
                              echo "</table>";
                              mysqli_close($mysqli);
                    ?>
          <!-- Javascript -->
          <!-- toggle password visibility function -->
          <script>
                      function showPass1() {
                      var x = document.getElementById("password");
                      if (x.type === "password") {
                          x.type = "text";
                      } else {
                          x.type = "password";
                      }
                      }
          </script>


</body>
</html>