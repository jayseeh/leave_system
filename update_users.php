<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	$employeeid = $request['employeeid']; //employee ID we are using it to get the employee record
	$username = $request['username']; //get the fullname from collected data above
	$userlevel = $request['userlevel']; //get the gendder from collected data above



	$servername = "localhost"; //set the servername
	$username = "root"; //set the server username
	$password = ""; // set the server password (you must put password here if your using live server)
	$dbname = "db_wblms"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

	// Set the INSERT SQL data
	$sql = "UPDATE tbl_users SET employeeid='".$employeeid."', username='".$username."', userlevel='".$userlevel."'";

	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql)) {
	  echo "User has been sucessfully updated.";
	} else {
	  return "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>