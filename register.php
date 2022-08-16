<?php include('server.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0";>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
	<div class="header">
		<h2>Register to Tracing Connections</h2>
	</div>

	<form method="post" action="https://tracingconnections.com/login.php">
		<?php include('errors.php') ?>
		<div class="input-group">
			<label>Firstname</label>
			<input class="whole-input"; type="text" name="firstname" id="firstname" value="" maxlength="50"required onkeyup='saveValue(this);'/>
		</div>
		<div class="input-group">
			<label>Last name</label>
			<input class="whole-input"; type="text" name="lastname" id="lastname" value="" maxlength="50" required onkeyup='saveValue(this);'/>
		</div>
		<div class="input-group">
			<label>Gender</label>
			
			<label>Male</label><input type="radio" name="gender" value="M"required>
			<label>Female</label><input type="radio" name="gender" value="F"required>
		</div>
		<div class="input-group">
			<label>Contact No.</label>
			<input class="whole-input"; type="text" minleng="12" maxlength="12" name="contactno" id="contactno" value="" placeholder="+639"  onkeypress="return /[0-9]/i.test(event.key)"required onkeyup='saveValue(this);'/>
		</div>
		<div class="input-group">	
			<label>Email</label>
			<input class="inputemail"; type="text" name="emailinput" id="emailinput" value="" maxlength="20"required onkeyup='saveValue(this);'/>
			<select type="text"name="email">
				<option value="@gmail.com">@gmail.com</option>
				<option value="@yahoo.com">@yahoo.com</option>
				<option value="@hotmail.com">@hotmail.com</option>
			</select>
		</div>
		<div class="input-group">
			<label>Address</label>
			<input class="whole-input"; type="text" name="address" id="address" value=""maxlength="120"required onkeyup='saveValue(this);'/>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input class="whole-input"; type="text" name="username" id="username"  value="" maxlength="50"required onkeyup='saveValue(this);'/>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input class="whole-input"; type="password" name="password_1" id="password_1" minlength="6" required>
		</div>
		<!-- <div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" id="password_2" minlength="6"required>
		</div> -->

		<div class="input-group">
			<button type="submit" class="btn" name="reg_user" id="register_btn">Register</button>

		</div>
		
		<p>Already a member? <a href="login.php">Sign in</a></p>
	</form>

	<script type="text/javascript">
        document.getElementById("firstname").value = getSavedValue("firstname");    
        document.getElementById("lastname").value = getSavedValue("lastname");   
		document.getElementById("contactno").value = getSavedValue("contactno");
		document.getElementById("emailinput").value = getSavedValue("emailinput");
		document.getElementById("address").value = getSavedValue("address");
		document.getElementById("username").value = getSavedValue("username");
        

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
	</script>

</body>
</html>