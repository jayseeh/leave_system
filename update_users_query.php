<?php
  require_once 'connection.php';
 
  if(ISSET($_POST['update'])){
    $employeeid = $_POST['employeeid'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userlevel = $_POST['userlevel'];
 
    mysqli_query($conn, "UPDATE `tbl_users` SET `fullname` = '$fullname', `username` = '$username', `password` = '$password', `userlevel` = '$userlevel' WHERE `employeeid` = '$employeeid'") or die(mysqli_error());
 
    header("location: usermanagement.php");
  }
?>