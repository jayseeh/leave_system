<?php
$conn = mysqli_connect("localhost", "root", "", "db_wblms");
$emp_id = $_POST['empID'];

$query = mysqli_query($conn,"SELECT * FROM tbl_leavecredits a INNER JOIN tbl_leave_list b on a.leave_id=b.id WHERE a.emp_id='$emp_id'");

if(mysqli_num_rows($query)>0){
	while($row=mysqli_fetch_assoc($query)){
		echo "<option value='".$row['leave_id']."'>".$row['leavetitle']."</option>";
	}
}else{
	echo "N";
	//echo "NO leaves credited yet. Please go to manage leave credits to add leaves for the assigned employee.";
}
