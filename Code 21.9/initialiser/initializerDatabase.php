<?php
require 'connection.php';
$conn = mysqli_connect($host, $user, $pass);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

//create database
$sql = "CREATE DATABASE Beyond_Screens";
// check if database is created
if (mysqli_query($conn, $sql)){
	echo "Database created successfully ";
} else {
	echo "Error creating database: " . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>