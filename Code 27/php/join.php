<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}


//getting coordinates and username from html
$coordinatesInput = $_GET['degree'];
$username = $_GET['username'];
$roomNumber = "Room".$coordinatesInput;

//checks if the room that the user wants to join exists, and if exists, it will update the room's database with the username
//$result = mysqli_query("SELECT 1 FROM listOfUsers WHERE number = $coordinatesInput");
//if ($result > 0){
	
$sql = "INSERT INTO $roomNumber (users)
VALUES ('$username')";

//$result = mysqli_query($conn, $sql);
if (mysqli_query($conn,$sql)){
	echo "Record updated successfully";
} else {
	echo "Error updating record: ";
	}
	// retrieve filenames and coordinates not done
//} else {
	//echo "Room is empty";
//}


$sql3 = "SELECT roomsJoined FROM listOfUsers WHERE username = '$username'";
$result2 = mysqli_query($conn,$sql3);
$row = mysqli_fetch_assoc($result2);

$roomList = $row["roomsJoined"];

$roomList = $roomList. "," . $coordinatesInput;
$sql2 = "UPDATE listOfUsers SET roomsJoined = '$roomList' WHERE username = '$username'";
if (mysqli_query($conn,$sql2)){
	echo "Record updated successfully";
} else {
	echo "Error updating record: ";
	}

//close connection
mysqli_close($conn);
?>
