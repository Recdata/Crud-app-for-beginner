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

if (isset($_GET['message'])){
	if ($_GET['message'] === 'delete'){
			echo " record deleted success <br> <br>";
	}
	else if ($_GET['message'] === 'success'){
		echo "record created successfully <br> <br>";
	}
	
}

$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);

?>

<table width="300" border="1" cellspacing="1" cellpadding="1">
	
	<?php
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {    
	?>		

	  <tr>
		<td>ID</td>
		<td><?php echo $row["id"]; ?></td>
		<td><a href="deluser.php?id=<?php echo $row["id"] ?>">Delete</a></td>
		<td><a href="update.php?id=<?php echo $row["id"] ?>">update</a></td>
	  </tr>
	  <tr>
		<td>First Name</td>
		<td><?php echo $row["firstname"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>Last Name</td>
		<td><?php echo $row["lastname"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>Email</td>
		<td><?php echo $row["email"]; ?></td>
		<td>&nbsp;</td>
	  </tr>
		
	<?php	
		} 
	?>
		</table>	
<?php	
	} else {
			echo "0 results";
		
	}

	
$conn->close();
?>

