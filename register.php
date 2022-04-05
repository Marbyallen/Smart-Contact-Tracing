<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration System</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
	<div class="header">
		<h2>Register to SmartC</h2>
	</div>

	<form method="post" action="register.php">
		<?php include('errors.php') ?>
		<div class="input-group">
			<label>Firstname</label>
			<input type="text" name="firstname" value="<?php echo $firstname; ?>" maxlength="50"required>
		</div>
		<div class="input-group">
			<label>Last name</label>
			<input type="text" name="lastname" value="<?php echo $lastname; ?>" maxlength="50"required>
		</div>
		<div class="input-group">
			<label>Gender</label>
			
			<label>Male</label><input type="radio" name="gender" value="male"required>
			<label>Female</label><input type="radio" name="gender" value="female"required>
		</div>
		<div class="input-group">
			<label>Contact No.</label>
			<input type="text" minleng="12" maxlength="12"name="contact" value="<?php echo $contact; ?>"  onkeypress="return /[0-9]/i.test(event.key)"required>
		</div>
		<div class="input-group">	
			<label>Email</label>
			<input type="text" name="emailinput"value="" maxlength="100"required>
			<select type="text"name="email">
				<option value="@gmail.com">gmail.com</option>
				<option value="@yahoo.com">yahoo.com</option>
				<option value="@hotmail.com">hotmail.com</option>
			</select>
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>"maxlength="120"required>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>"maxlength="50"required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" minlength="6" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" minlength="6"required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>Already a member? <a href="login.php">Sign in</a></p>
	</form>
</body>
</html>