<?php
	session_start();
	header("Location: index.php"); // Redirecting To Home Page
	unset($_SESSION['employeeid']);//id
	unset($_SESSION['username']);//name
	unset($_SESSION['password']);//pass
	unset($_SESSION['userlevel']);//ulvl

?>
