<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include("connection.php");
    
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
    
     
    // query
    $sql = "INSERT INTO tbl_emp_list (empID, firstname, middlename, lastname, gender, civilstatus, bday, bplace, contactnumber, address, empstatus, position) VALUES ('$empID', '$firstname', '$middlename', '$lastname', '$gender', '$civilstatus', '$bday', '$bplace', '$contactnumber', '$address', '$empstatus', '$position');";

    // execute query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Employee successfully added!'); window.location = 'employeemanagement.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }     
  }
?>