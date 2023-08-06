<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$TutionDistrict = $_POST['TutionDistrict'];
	$gender = $_POST['gender'];
	$phoneNumber = $_POST['phoneNumber'];
	$YourLocation = $_POST['YourLocation'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	// Database connection
	$conn = new mysqli('localhost','root','','plan');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, TutionDistrict, gender, phoneNumber, YourLocation, password, cpassword) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssisss", $name, $email, $TutionDistrict, $gender, $phoneNumber, $YourLocation, $password, $cpassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>