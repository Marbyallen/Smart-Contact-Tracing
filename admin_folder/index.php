<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Head Admin</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="\assets_admin\mymain1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          </head>
          <body>
            <header>
              <ul>
                <li><h1 id="titlemain" >Smart Contact Tracing</h1></li>
                <li class="topmenu"><a href="loginadmin.html" target="_self">Login as Admin</a></li>
              </ul>
            </header>
            <main>
              <h2>Login as Admin</h2>
              <!-- Login as Admin -->
              <form method="post" action="loginadmin.html">
                <div class="form-group">
                <label>Username</label>
                <input type="text" name="username">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
                <br>
                <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                </div>
              </form>
            </main>
            <footer>
              <p>Page created by Smart Contact Tracing team</p>
            </footer>
          </body>
</html>