<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// var_dump($_POST);exit();
$fname = val($_POST["fname"]);  
$lname = val($_POST["lname"]);  
$email = val($_POST["email"]);
$id = val($_POST['id']);  

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email' WHERE id = '$id' ";



if ($conn->query($sql) === TRUE) {
	#echo "updated";
    header("location:delete.php?message=success&id=".$id); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>