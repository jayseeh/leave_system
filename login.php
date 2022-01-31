<?php

session_start();
include("connection.php");

if(isset($_POST["login"]))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM tbl_users 
                     WHERE username= '$username' AND password='$password'");
 

    $row = mysqli_fetch_array($query);
  if (mysqli_num_rows($query)>0){
  	$_SESSION["employeeid"] = $row['employeeid'];
  	$_SESSION["fullname"] = $row['fullname'];
	$_SESSION["username"] = $row['username'];
	$_SESSION["password"] = $row['password'];
	$_SESSION["userlevel"] = $row['userlevel'];


  }else{?>
  	<script type = "text/javascript">
		alert("Invalid Username or Password!");
		window.location.href="index.php";
	</script>
  <?php }
 
  /*
  $row = mysqli_fetch_array($query);


if(is_array($row)){
					$_SESSION["idnumber"] = $row['idnumber'];
					$_SESSION["username"] = $row['username'];
					$_SESSION["password"] = $row['password'];
					$_SESSION["userlevel"] = $row['userlevel'];
				  }
else{
	echo '<script type = "text/javascript">';
	echo 'alert("invalid Idnumber or Password.");';
	echo 'windows.location.href = "index.php"';
	echo '<script>';
	}*/

}


if (isset($_SESSION['username']))

	if ( $row['userlevel'] == 'Admin')
		{
			header("Location: admin.php");
		}
	else ($row['userlevel'] == 'Staff') 
		{
			header("Location: staff.php")
		}

?>