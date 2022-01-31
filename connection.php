<?php
		// server configuration
		$dbservername = "localhost"; //localhost server
		$dbusername = "root"; // database user
		$dbpassword = ""; //database password
		$dbname = "db_wblms"; //database name

		// Create connection
		$conn = mysqli_connect("localhost", "root", "", "db_wblms");


		// Check connections
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
?>
