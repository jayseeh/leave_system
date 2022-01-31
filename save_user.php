
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("connection.php");
		
		// get form value
		$employeeid = $_POST['employeeid'];
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userlevel = $_POST['userlevel'];
		
		 
		// query
		$sql = "INSERT INTO tbl_users (employeeid, fullname, username, password, userlevel) VALUES ('$employeeid', '$fullname', '$username', '$password', '$userlevel');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>alert('User successfully added!'); window.location = 'usermanagement.php';</script>";
		} else {
		    echo "<script>alert('Duplicate!'); window.location = 'usermanagement.php';</script>";
		}			
	}
?>

