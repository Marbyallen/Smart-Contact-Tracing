<?php include('server.php') ?>
<!DOCTYPE html>
<head>
</head>
    <link rel="stylesheet" href="login.css">
    <title>DATA HISTORY</title>
</head>
<body>
    <div class="wrapper">
        <div class="registration">
            <h1>Log In to SMARTC</h1>
            <form method="post">
				<?php include('errors.php') ?>
                <div class="user-detail">
                    <div class="inputs">
                        <h3 class="details">Username</h3>
                        <input type="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="inputs">
                        <h3 class="details">Password</h3>
                        <input type="password" name="password" placeholder="Password" minlength = "6"required>
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