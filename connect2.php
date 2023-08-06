<?php
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','know');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(email, phone, password) values(?, ?, ?)");
		$stmt->bind_param("sis", $email, $phone, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>