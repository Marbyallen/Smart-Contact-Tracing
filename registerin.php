<?php
	$Fname = $_POST['First_Name'];
	$Lname = $_POST['Last_Name'];
	$gender = $_POST['Gender'];
          $Cnumber = $_POST['Contact_No'];
          $Eaddress = $_POST['Email_Address'];
          $address = $_POST['Address'];
          $username = $_POST['username'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost', 'u923368226_tracingconnect', 'Mainsct21!', 'u923368226_contactTracing');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users_table(First_Name, Last_Name, Gender, Contact_No, Email_Address, Address, username, password) values(?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param("sssissss", $Fname, $Lname, $gender, $Cnumber, $Eaddress, $address, $username,$password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>