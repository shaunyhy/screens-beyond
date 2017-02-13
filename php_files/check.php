<?php
require 'con.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}


//getting coordinates from html
//$coordinatesInput = $_GET['degree'];
$coordinatesInput = 100;

//checking input coordinates against database coordinates

$result = mysqli_query($conn, "SELECT FROM listOfUsers WHERE username = 'Chris'");
//echo $result;
if ($result){
	while ($row = mysqli_fetch_array($result)){
		echo $row["reg_date"];
	}
} else {
	echo "no result";
}
/*
if ($result == false){
	echo "failed";
}
if ($result > 0){
	echo "Join";
} else {
	echo "HELLO";
	echo $result;
	echo "Host";
}
*/
	
//close connection
mysqli_close($conn);

?>