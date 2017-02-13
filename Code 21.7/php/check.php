<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}


//getting coordinates from html
$coordinatesInput = $_GET['degree'];

//checking input coordinates against database coordinates

$sql = "SELECT number FROM listOfUsers WHERE number = '$coordinatesInput'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hostnumber = $row["number"];


if ($coordinatesInput == $hostnumber) {
	echo "Join";
} else {
	echo "Host";
}


//close connection
mysqli_close($conn);

?>