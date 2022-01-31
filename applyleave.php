<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		include("connection.php");
		
		// get form value
		
		$employeeid = $_POST['employeeid'];
		$employeename = $_POST['employeename'];
		$typeofleave = $_POST['typeofleave'];
		$hours = $_POST['hours'];
		$minutes = $_POST['minutes'];
		$todate = $_POST['todate'];
		$fromdate = $_POST['fromdate'];
		$datefiled = $_POST['datefiled'];
		$reason = $_POST['reason'];

		// query
		$sql = "INSERT INTO tbl_leaveform (employeeid, employeename, typeofleave, hours, minutes, todate, fromdate, datefiled, reason) VALUES ('$employeeid', '$employeename', '$typeofleave', '$hours', '$minutes', '$todate', '$fromdate', '$datefiled', '$reason');";

		//to update remaining leaves on the employee
		$fetch_remaining = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tbl_leavecredits WHERE emp_id='$employeeid' AND leave_id='$typeofleave'"));
		$updated_bal=$fetch_remaining['hrs_remaining']-$hours;
		mysqli_query($conn,"UPDATE tbl_leavecredits SET hrs_remaining='$updated_bal' WHERE emp_id='$employeeid' AND leave_id='$typeofleave'");
		// execute query
		if ($conn->query($sql) === TRUE) {

			$sqlrecord = "SELECT * FROM tbl_leave_record WHERE emp_id='$employeeid' AND leavetitle='$typeofleave' ORDER BY ID DESC LIMIT 1";
			$record = mysqli_query($conn, $sqlrecord);
			$recordrow=mysqli_fetch_array($record);

			if (mysqli_num_rows($record) > 0){

				if($hours < $recordrow['remaining_hrs']){
					if($minutes < $recordrow['remaining_mins']){
						$minsnow= $recordrow['remaining_mins'] - $minutes;
						$hrsnow= $recordrow['remaining_hrs'] - $hours;

						$sqlleaveadd = "INSERT INTO tbl_leave_record (emp_id, leavetitle, remaining_hrs, remaining_mins) VALUES ('$employeeid', '$typeofleave', '$hrsnow', '$minsnow');";

						if ($conn->query($sqlleaveadd) === TRUE) {
							echo "<script>alert('Leave Application successfully submitted!'); window.location = 'leaveform.php'; </script>";
						}else{
							//echo "<script>alert('Leave Application not submitted!'); window.location = 'leaveform.php';</script>";
							echo "Error: " . $sqlleaveadd . "<br>" . $conn->error;
						}

					} else {
						$initialmins=$recordrow['remaining_mins'] - $minutes;
						$minsnow=60-abs($initialmins);
						$hrsnow= $recordrow['remaining_hrs'] - $hours - 1;

						$sqlleaveadd = "INSERT INTO tbl_leave_record (emp_id, leavetitle, remaining_hrs, remaining_mins) VALUES ('$employeeid', '$typeofleave', '$hrsnow', '$minsnow');";

						if ($conn->query($sqlleaveadd) === TRUE) {
							echo "<script>alert('Leave Application successfully submitted!'); window.location = 'leaveform.php';</script>";
						}else{
							//echo "<script>alert('Leave Application not submitted!'); window.location = 'leaveform.php';</script>";
							echo "Error: " . $sqlleaveadd . "<br>" . $conn->error;
						}

					}
				} else {
					echo "<script>alert('Remaining time isn't enough!'); window.location = 'leaveform.php';</script>";
				}

				
					
			}else{
				$sqlleave1 = "SELECT * FROM tbl_leave_list WHERE leavetitle='$typeofleave'";
				$leave1 = mysqli_query($conn, $sqlleave1);
				$leaverow = mysqli_fetch_array($leave1);


					$hrsneed = $leaverow['hours'];
					$minsneed =$leaverow['minutes'];
						$hrsnowadd = $hrsneed - $hours;
						$minsnowadd = $minsneed - $minutes;

				$sqlleaveadd = "INSERT INTO tbl_leave_record (emp_id, leavetitle, remaining_hrs, remaining_mins) VALUES ('$employeeid', '$typeofleave', '$hrsnowadd', '$minsnowadd');";

					if ($conn->query($sqlleaveadd) === TRUE) {
						echo "<script>alert('Leave Application successfully submitted!'); window.location = 'leaveform.php';</script>";
					}else{
					echo "<script>alert('Leave Application not submitted!'); window.location = 'leaveform.php';</script>";
						echo "Error: " . $sqlleaveadd . "<br>" . $conn->error;
					}

			}
			
		   	//echo "<script>alert('Leave Application successfully submitted!'); window.location = 'leaveform.php';</script>";
		} else {
			echo "<script>alert('Leave Application not submitted!'); window.location = 'leaveform.php';</script>";
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}			
	}
?>