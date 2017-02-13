<?php
require 'con.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

// delete table
$sql2 = "DROP TABLE listOfUsers";

if (mysqli_query($conn, $sql2)){
	echo "Table deleted successfully";
} else {
	echo "Error deleting tabke: " . mysqli_error($conn);
}

//close connection
mysqli_close($conn);


?> 