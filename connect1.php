<?php
	$name = $_POST['name'];
	$selectMedium= $_POST['selectMedium'];
	$District = $_POST['District'];
	$phoneNumber = $_POST['phoneNumber'];
	$Location = $_POST['Location'];
	$whichClass = $_POST['whichClass'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','bevor');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, selectMedium, District, phoneNumber, Location,
		 whichClass) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $name,  $selectMedium, $District, $phoneNumber, $Location, $whichClass );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>