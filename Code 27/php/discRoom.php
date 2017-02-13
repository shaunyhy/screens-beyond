<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT number FROM listOfUsers";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0){
	//output data of each row
	while ($row = mysqli_fetch_assoc($result)){
		echo $row["number"] .";";
	}
} else {
	echo "";
}

//close connection
mysqli_close($conn);
?>