<?php
include("connection.php");
$employeeid = $_POST['id'];
$typeofleave = $_POST['leave'];
$sqlrecord = "SELECT * FROM tbl_leave_record WHERE emp_id='$employeeid' AND leavetitle='$typeofleave' ORDER BY ID DESC LIMIT 1";
			$record = mysqli_query($conn, $sqlrecord);
			$recordrow=mysqli_fetch_array($record);

			if (mysqli_num_rows($record) > 0){
			echo $recordrow['remaining_hrs']."Hrs and ".$recordrow['remaining_mins']."Mins left.";
		}else{
			$sqlleave1 = "SELECT * FROM tbl_leave_list WHERE leavetitle='$typeofleave'";
				$leave1 = mysqli_query($conn, $sqlleave1);
				$leaverow = mysqli_fetch_array($leave1);

				echo $leaverow['hours']."Hrs and ".$leaverow['minutes']."Mins left.";
		}
?>