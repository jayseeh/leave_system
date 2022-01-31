<?php


// Get the user id 
$empID = $_REQUEST['empID'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "db_wblms");
  
if ($empID !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT firstname, middlename, lastname FROM tbl_emp_list WHERE empID='$empID'");
 

    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $employeename = $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"];
  
   
}
  
// Store it in a array
$result = array("$employeename");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>