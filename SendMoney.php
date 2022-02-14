<?php
	$Sender = $_POST['Senders username'];
	$Recipient = $_POST['Recipients username'];
	$BankBalance = $_POST['enterAmount'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','customer');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into money(Sender's username,Recipient's username,enterAmount) values(?, ?, ?)");
		$stmt->bind_param("ssi",$Sender,$Recipient,$BankBalance);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>