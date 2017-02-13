<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
$roomNumber = $_GET["room"];

$sql = "SELECT filename, coord FROM $roomNumber";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0){
	//output data of each row
	while ($row = mysqli_fetch_assoc($result)){
		echo $row["coord"] . "," . $row["filename"] . ";";
	}
} else {
	echo "0 results";
}

//close connection
mysqli_close($conn);
?>