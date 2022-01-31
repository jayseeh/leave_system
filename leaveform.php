<?php 
session_start();
date_default_timezone_set("Asia/Singapore");
$nowYear = date('Y-m-d');
?>
<?php
    $conn = mysqli_connect("localhost", "root", "", "db_wblms");
    $sql = "SELECT * FROM `tbl_emp_list` WHERE empstatus = 'Regular'";
    $res = mysqli_query ($conn, $sql);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>


 
    <title>Record Leave Application</title>

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
  font-size: 12px;
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
  margin-right: 30px;
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


h3{
  font-family: "Rockwell";
  text-align: center;
  font-weight: bold;
}

th{
  font-family: "Rockwell";
  font-size: 15px;
  text-align: left;
}

td{
  font-family: "Rockwell";
  font-size: 15px;
  text-align: left;
}


#background{
    position:absolute;
    z-index:0;
    display:block;
    min-height:50%; 
    min-width:50%;
    color:yellow;
    opacity:0.4;
    padding-top: 34px;
    padding-left: 150px;
}


table{
    position:absolute;
    background-color: white;
    margin-left: 180px;
}

table
{
    background-image: url(slc_logo.png);
}

#myImg
{
position: absolute;
}

.col-form-label{
  font-size: 14px;
  font-weight: bolder;
  font-family: Arial Black;
}
</style>
</head>

<body class="body">           

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

        <li class="nav-item">
      <div>
        <a class="nav-link" href="leaveform.php">Manage Employee</a>
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
          <li><a class="dropdown-item" href="backup.php">Back up</a></li>
          <li><a class="dropdown-item" href="restore.php">Restore</a></li>
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



<form action="applyleave.php" method="POST" onsubmit="return confirmSave()" style="width: 100%;" class="inline">
<center>

<table align="center">
  
  <tr>
<th colspan="10" align="center">
    <h3>Record Leave Application</h3>
    <br>
</th>
</tr>
<tr>
  <td>
<div class="form-row">

  <label  class="col-sm-2 col-form-label">Date Filed:</label>
                  <div class="col-sm-3 mb-2">
                 
                      <input type="date" class="form-control" id="datefiled" name="datefiled"  required value="<?php echo $nowYear; ?>">
                    </div>
                   
            </div>
</td></tr>
<tr>
      <td colspan="10"> 
        <div class="form-row">
                    <label  class="col-sm-2 col-form-label">Employee ID:</label>
                  <div class="col-sm-3 mb-2">
                    <input type="text" name="employeeid" 
                        id="id" class="form-control"
                         value="" readonly="">
                    </div>   
            </div>
        </td>
</tr>
<tr>
<td colspan="10">
             <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Employee Name:</label>
                  
                  <div class="col-sm-7">
                        <select class="form-control chosen" id="en" name="employeename"  data-live-search="true" >
        <option>Search Employee</option>
        <?php
            include("get.php");

            // ALSO ADD THE ID COLUMN TO YOUR SELECT QUERY SO YOU HAVE IT AVAILABLE TO YOU.
            $result =   mysqli_query($con, "SELECT firstname, middlename, lastname, empID FROM tbl_emp_list WHERE empstatus='Regular' ");

            while($row  = mysqli_fetch_assoc($result)){
                // YOUR OPTION SHOULD HAVE A VALUE ATTRIBUTE IF YOU WISH TO SAVE THE FORM.
                // CHANGE $row["id"] TO THE APPROPRIATE NAME OF THE FIELD
                // CORRESPONDING TO EMPLOYEE ID.
                echo "<option value='{$row["firstname"]} {$row["middlename"]} {$row["lastname"]}' data-emp-id='{$row["empID"]}' >";
                echo $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] ;"</option>";
            }
        ?>
    </select>      
                  </div>
              </div>
</td></tr>




<tr><td>
              <div class="form-group row">
                 <label  class="col-sm-2 col-form-label">Select Leave:</label>
                  <div class="col-sm-4 mb-2"  id="typeleave">

                      
                    <select name="typeofleave" class="form-control chosen">
                    <?php 
                    include 'connection.php';
                    $sql = "SELECT * FROM tbl_leave_list";
                    $sqlvalidate = mysqli_query($conn, $sql);
                    ?>
                    <option value="" selected></option>
                    
                    </select>
                  </div>
                  <p id="toViewTime"></p>
              </div>
</td></tr>

<tr><td>
              <div class="form-group row">
                  <div class="col-md-1 mb-1">
                    <label></label>
                  </div>
                  <div class="col-md-2 mb-2">
                    <label for="validationCustom01" class="col-form-label">Hours:</label>
                    <input type="number" class="form-control"  id="hours" name="hours"  required >
                  </div>
                  <div class="col-md-2 mb-2">
                    <label for="validationCustom02" class="col-form-label">Minutes:</label>
                    <?php $reslt = "00"; ?> 
                    <input type="number" class="form-control" id="minutes" name="minutes" value="<?php echo $reslt;?>" required>
                  </div>
                  <div class="col-md-3 mb-2">
                    <label for="validationCustom01" class="col-form-label">From Date:</label>
                    <input type="date" class="form-control" id="fromdate" name="fromdate"  required>
                  </div>
                  <div class="col-md-3 mb-2">
                    <label for="validationCustom01" class="col-form-label">To Date:</label>
                    <input type="date" class="form-control" id="todate" name="todate"  required>
                  </div>
              </div>
</td></tr>

<tr><td>
              <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Reason:</label>
                  <div class="col-sm-7">
                  <textarea class="form-control" name="reason" id="reason"></textarea>
                  </div>
              </div>
</td></tr>

 <tr><td>             <div class="form-group row" align="right">
                  <div class="col-lg-11">
                    <button class="btn btn-primary" type="submit" name="save" value="Submit">Submit</button>&nbsp
                    <button class="btn btn-primary" type="reset" name="Clear" value="Clear">Clear</button>
                  </div>
              </div>
            </td></tr>
</form>
</table>


</center>

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
<script src="select2.min.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript">

$(".chosen").chosen();




        (function($) {
            $(document).ready(function(){
                var empName = $("#en");
                var empID   = $("#id");
                var empLeave= $("#lv")

                empName.on("change", function(evt){
                    var eN  = $(this);          
                    var eID = eN.children('option:selected').attr("data-emp-id");
                    empID.val(eID);
                });

                empID.on("change", function(evt){
                    var eN  = $(this);          
                    var eID = eN.children('option:selected').attr("data-emp-id");
                    empLeave.val(eID);
                });
                
                $("#en").change(function(){
                  idid = $("#id").val();
                  console.log(idid);
                  $.post("validate_leave.php",
                  {
                    empID: idid
                  },
                  function(data){
                    if(data=='N'){
                      alert("NO leaves credited yet. Please go to manage leave credits to add leaves for the assigned employee.");
                      location.reload();
                    }else{
                      console.log(data);
                      
                      $("#typeleave").html("<select id='toselect' name='typeofleave' class='form-control'><option value='0'>Select an Option</option>"+data+"</select>");
                    }
                    //alert("Data: " + data + "\nStatus: " + status);
                    trial = $("#toselect").val();
                    console.log(trial);
                    $("#toselect").change(function(){
                      leavesdata = $(this).val();
                      idids = $("#id").val();
                      $.post("validate_type.php",
                      {
                        leavesID: leavesdata,
                        empID: idids
                      },
                      function(data){
                        //alert("Data: " + data + "\nStatus: " + status);
                        $("#toViewTime").html(data);
                        //$("#hours").max();
                        //$("#hours").attr({"max" : 10});
                      });
                      console.log(leavesdata);
                    });
                  });
                  
                });



                
               
            });
        })(jQuery);
    </script>





 <?php include 'script.php';?>
</body>
</html>