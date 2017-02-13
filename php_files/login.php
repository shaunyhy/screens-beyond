<?php
require 'con.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$username = $_GET['username'];

;
//cannot put same name
//$sql2 = "SELECT username, COUNT(*) c FROM listOfUsers GROUP BY username HAVING c > 1";
//$result = mysqli_query($conn, $sql2);
/*
if ($result){
	echo "Taken";
} else {
*/
// check if inserting is done
$sql = "INSERT IGNORE INTO listOfUsers (username)
VALUES ('$username')";
if (mysqli_query($conn, $sql)) {
	echo "Success"; 
} else {
	echo "Error";
}

//close connection
mysqli_close($conn);

?>