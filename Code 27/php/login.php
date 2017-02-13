<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$username = $_GET['username'];


// check if inserting is done


//cannot put same name
$sql2 = "SELECT username FROM listOfUsers WHERE username = '$username'";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);
$currentUser = $row["username"];

if ($currentUser == $username) {
	echo "Taken";
} else {
	$sql = "INSERT INTO listOfUsers (username, roomsJoined)
	VALUES ('$username', '0')";
	if (mysqli_query($conn, $sql)) {
		echo "Success"; 
	} else {
		echo "Error";
	};
}


//close connection
mysqli_close($conn);

?>