<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$coordinates = $_GET["degree"];
$roomNumber = 'Room'.$coordinates;
$username = $_GET["username"];

//insert coordinates into listOfUsers


$sql = "SELECT number FROM listOfUsers WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$currentHostNumber = $row["number"];

if ($currentHostNumber > 0 ) {
	echo "Hosted";
} else {

	$sql3 = "UPDATE listOfUsers SET number = '$coordinates' WHERE username = '$username'";
	//check if coordinates successfully added
	if (mysqli_query($conn,$sql3)){
		echo "";
	} else {
		echo "Error" . mysqli_error($conn);
	}

	//create table using the coordinate
	$sql2 = "CREATE TABLE $roomNumber (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	users VARCHAR(30) NOT NULL,
	filename VARCHAR(30),
	url VARCHAR(50),
	coord VARCHAR(3)
	)";
	//check if the table is created
	if (mysqli_query($conn, $sql2)){
		echo "";
	} else {
		echo "Error" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>