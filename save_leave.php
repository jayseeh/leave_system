
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("connection.php");
		
		// get form value
		$id = $_POST['id'];
		$leavetitle = $_POST['leavetitle'];
		$emp_gender = $_POST['emp_gender'];
		$hours = $_POST['hours'];
		$minutes = $_POST['minutes'];
		
		 
		// query
		$sql = "INSERT INTO tbl_leave_list (id, leavetitle, emp_gender, hours, minutes) VALUES ('$id', '$leavetitle', '$emp_gender', '$hours', '$minutes');";

		// execute query
		if ($conn->query($sql) === TRUE) {
		   	echo "<script>alert('Leave successfully added!'); window.location = 'usermanagement.php';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}			
	}
?>
