<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$username = $_GET['username'];
$roomNumber = $_GET['roomNumber'];

$sql = "DELETE FROM listOfUsers WHERE username = '$username'";

if (mysqli_query($conn, $sql)){
	echo "";
} else {
	echo "Error deleting record: " . mysqli_error($conn);
}

$sql2 = "DROP TABLE $roomNumber";

if (mysqli_query($conn, $sql2)){
	echo "You have logged out";
} else {
	echo "Error deleting table: " . mysqli_error($conn);
}

//close connection
mysqli_close($conn);
?>

