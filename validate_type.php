<?php
$conn = mysqli_connect("localhost", "root", "", "db_wblms");
$emp_id = $_POST['empID'];
$leave_id = $_POST['leavesID'];

$query = mysqli_query($conn,"SELECT * FROM tbl_leavecredits WHERE emp_id='$emp_id' AND leave_id='$leave_id'");

if(mysqli_num_rows($query)>0){
	while($row=mysqli_fetch_assoc($query)){
		echo $row['hrs_remaining']."Hrs and ".$row['mins_remaining']."mins remaining.";
	}
}else{
	echo "N";
	//echo "NO leaves credited yet. Please go to manage leave credits to add leaves for the assigned employee.";
}
