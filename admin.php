<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Admin</title>

	<style>

.body {
background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(21,105,199,1) 100%);
background-attachment: fixed;
}

.header img1 {
  float: left;
}

.header img2 {
  float: right;
}

.header {
  font-family: "Old English text MT";
  font-size: 40px;
  font-weight: bold;
  color: #1569c7;
  text-shadow: 1px 2px 7px #00008B;
}

.header-a {
  font-family: "Arial";
  font-size: 15px;
  font-weight: bold;
  color: #1569c7;
  text-shadow: 1px 1px 4px #00008B;
}

.header-b {
  font-family: "Arial";
  font-size: 13px;
  color: #00008B;
  float: right;
  margin-top: 15px;

}
.navbar-brand {
  font-family: "Bookman Oldstyle";
  font-size: 20px;
  font-weight: bold;
  color: #29465B;
  text-shadow: 1px 1px 4px #F8F8FF;
  margin-right: 40px;

}

table{
  font-family: "Times New Roman";
  font-size: 10px;
  font-weight: bold;
}

.navbar-text{
  margin-left: auto;
}

.navbar{
  padding-top: 0px;
  padding-bottom: 0px;
  margin-top: 5px;
}


#myImg {
   position:center;
   bottom:5px;
   right:5px;
   opacity: 0.5;
   z-index:99;
   color:white;
   user-select: none;
}


</style>
</head>


<body class="body">

<form action="login.php" method="post">
           

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img class="img1" src="image/slc_logo.png" width="50px" >
  <h1 class="navbar-brand">Web-based Leave Management System</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item">
      <div>
        <a class="nav-link" href="employeemanagement.php">Manage Employee</a>
      </div>
      </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Manage Leave
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="leaveform.php">Record Leave Application</a>
        </div>
      </li>

      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Reports
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="reports.php">List of Employees Filed for Leave</a>
          <a class="dropdown-item" href="regularemployees.php">List of Regular Employees</a>
          <a class="dropdown-item" href="contractualemployees.php">List of Contractual Employees</a>
          <a class="dropdown-item" href="provisionalemployees.php">List of Probationary Employees</a>
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Utilities
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="usermanagement.php">User Management</a>
          </li>
          <li>&nbsp &nbsp &nbsp
              <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#forms_modal"> Add Leave Type</button>
          </li>
          <li>&nbsp &nbsp &nbsp &nbsp<a class="btn btn-light btn-sm" href="backup.php"> Back up</a></li>
          <li>&nbsp &nbsp &nbsp
              <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#restore_modal"> Restore</button>
          </li>
          <li><a class="dropdown-item" href="help.php">Help</a></li>
        </ul>
        </li>

    </ul>
    <span class="navbar-text">
      <h1 class="header-b"><a href="admin.php">Welcome <?php echo $_SESSION ['fullname'];?>, you logged in as <?php echo $_SESSION['userlevel'];?> ! &nbsp</a></h1>
    </span>
    <span class="navbar-logout">
      <a href="logout.php" onclick="return confirmLogout()" name="logout"><img src="image/logout.png" width="20px"></a>
    </span>
  </div>
</nav>
<br>
<br>


<center>
<img id="myImg" src="image/slc.jfif" alt="Saint Louis College" style="width:100%;max-width:1000px">


</form>

<br><br><br>

</center>






<div class="modal fade" id="restore_modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <form method="POST" action="restore.php">
          <div class="modal-header">
            <h3>RESTORE</h3>
          </div>
          <div class="modal-body">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <div class="form-group">

                <label>Select Sql File</label>
               <input type="file" class="choose" name="database" value="RESTORE"><br>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <input type="submit" class="btn-restore" name="import" value="RESTORE">
            
            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>  


<div class="modal fade" id="forms_modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="save_leave.php">
          <div class="modal-header">
            <h3>ADD LEAVE TYPE</h3>
          </div>
          <div class="modal-body">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <div class="form-group">

                <label>Leave Title:</label>
               
                <input name="leavetitle" class="form-control" required="required"/>
              </div>

              <div class="form-row">
                    <div class="col-md-6 mb-5">
                        <label>Hours:</label>
                        <input id="hours" name="hours" type="number" class="form-control" required="required" />
                    </div>
                    <div class="col-md-6 mb-5">
                        <label>Minutes:</label>
                        <input id="minutes" name="minutes" type="number" class="form-control" required="required"/>
                    </div>
              </div>

              
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>  

  
 <?php include 'script.php';?>
</body>
</html>