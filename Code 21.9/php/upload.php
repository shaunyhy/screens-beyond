<?php
require 'connection.php';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$fileCoordinates = $_POST['filedegree'];
$roomNumber = $_POST['roomdegree']; //get from cookie

//Directory where the files will be saved
$target = 'files/'; //need to change the DIR
$target = $target.basename( $_FILES['file']['name']);
$filename = basename( $_FILES['file']['name']);
//echo $filename;

//Writes the file to the server  

if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){   
	echo "";    
} else {   
	echo "Errr uploading".mysqli_error($conn);
}


$sql2 = "SELECT coord FROM $roomNumber WHERE coord = $fileCoordinates";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);
$tableFileDegree = $row["coord"];
//echo $tableFileDegree;

if ($fileCoordinates == $tableFileDegree) {
	echo "Coordinate is taken, please choose another coordinate";
} else {
	$sql = "INSERT $roomNumber (filename, coord)
	VALUES ('$filename', '$fileCoordinates')";
	if (mysqli_query($conn, $sql)) {
		echo "File is successfully uploaded";
	} else {
		echo "Error updating" . mysqli_error($conn);
	};
}

//inserting filename and file coordinate into host's table






//close connection
mysqli_close($conn);
?>
