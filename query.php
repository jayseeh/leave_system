<?php
  require_once 'connection.php';
 
  if(ISSET($_POST['update'])){

    // get form value
    $empID = $_POST['empID'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $civilstatus = $_POST['civilstatus'];
    $bday = $_POST['bday'];
    $bplace = $_POST['bplace'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    $empstatus = $_POST['empstatus'];
    $position = $_POST['position'];

    mysqli_query($conn, "UPDATE tbl_emp_list SET firstname='$firstname', middlename='$middlename', lastname='$lastname', gender='$gender', civilstatus = '$civilstatus', bday = '$bday', bplace = '$bplace', contactnumber = '$contactnumber', address = '$address', empstatus = '$empstatus', position = '$position' WHERE empID = '$empID'") or die(mysqli_error());
 
    header("location: employeemanagement.php");
  }
?>