<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$username = $_GET['username'];

$sql = "SELECT roomsJoined FROM listOfUsers WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$roomList = $row["roomsJoined"];
echo $roomList;

mysqli_close($conn);

?>