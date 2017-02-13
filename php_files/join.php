<?php
require 'con.php';

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
	
$sql = "INSERT INTO ".$roomNumber." (users)
VALUES ($username)";
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn,$sql)){
	echo "Record updated successfully";
} else {
	echo "Error updating record: " . mysqli_error($conn);
	}
	// retrieve filenames and coordinates not done
//} else {
	//echo "Room is empty";
//}

$roomList = "0";

$roomlist = $roomList . "," . $coordinatesInput;

//close connection
mysqli_close($conn);
?>
