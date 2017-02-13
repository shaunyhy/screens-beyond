<?php
require 'con.php';
$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
//to create a new column with array roomsJoined

//create table in Beyond_Screens
$sql = "CREATE TABLE listOfUsers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
number VARCHAR(3) NOT NULL,
roomsJoined VARCHAR(30) NOT NULL,
UNIQUE (username),
reg_date TIMESTAMP
)";
// check if table in Beyond_Screens is created
if (mysqli_query($conn, $sql)){
	echo "Table for listOfUsers created successfully ";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}

//inserting into database
$sql2 = "INSERT INTO listOfUsers (username, number, roomsJoined)
VALUES ('test1' , '360', '0')";
// check if inserting is done
if (mysqli_query($conn, $sql2)) {
	echo "New records created successfully ";
} else {
	echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

//close connection
mysqli_close($conn);
?>