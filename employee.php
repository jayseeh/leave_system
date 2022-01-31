<?php 
session_start();
?>

<?php
    $conn = mysqli_connect("localhost", "root", "", "db_wblms");
    $sql = "SELECT * FROM `tbl_emp_list` WHERE empstatus = 'Regular'";
    $res = mysqli_query ($conn, $sql);

?>
<?php
  require_once("perpage.php");  
  require_once("dbcontroller.php");
  require_once("connection.php");
  $db_handle = new DBController();
  
  $empID = "";
  $firstname = "";
  $middlename = "";
  $lastname = "";
  
  $queryCondition = "";
  if(!empty($_POST["search"])) {
    foreach($_POST["search"] as $k=>$v){
      if(!empty($v)) {

        $queryCases = array("empID", "firstname","middlename", "lastname");
        if(in_array($k,$queryCases)) {
          if(!empty($queryCondition)) {
            $queryCondition .= " AND ";
          } else {
            $queryCondition .= " WHERE ";
          }
        }
        switch($k) {
          case "empID":
            $empID = $v;
            $queryCondition .= "empID LIKE '" . $v . "%'";
            break;
          case "firstname":
            $firstname = $v;
            $queryCondition .= "firstname LIKE '" . $v . "%'";
            break;
          case "middlename":
            $middlename = $v;
            $queryCondition .= "middlename LIKE '" . $v . "%'";
            break;
          case "lastname":
            $lastname = $v;
            $queryCondition .= "lastname LIKE '" . $v . "%'";
            break;
        }
      }
    }
  }
  $orderby = " ORDER BY empID desc"; 
  $sql = "SELECT * FROM tbl_emp_list " . $queryCondition;
  $href = 'employeemanagement.php';          
    
  $perPage = 10; 
  $page = 1;
  if(isset($_POST['page'])){
    $page = $_POST['page'];
  }
  $start = ($page-1)*$perPage;
  if($start < 0) $start = 0;
    
  $query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
  $result = $db_handle->runQuery($query);
  
  if(!empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link  href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="style.css" type="text/css"  />




<title>Manage Employee</title>
  </head>
  
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



.navbar-text{
  margin-left: auto;
}

.navbar{
  padding-top: 0px;
  padding-bottom: 0px;
  margin-top: 5px;
}

.SearchBar{
  margin-left: 180px;
}

h3{
  font-family: "Rockwell";
  text-align: center;
  font-weight: bold;
}





.dropdown-submenu{
    position: relative;
}

.dropdown-submenu a::after{
    transform: rotate(-90deg);
    position: absolute;
    right: 3px;
    top: 40%;
}
.dropdown-submenu:hover .dropdown-menu, .dropdown-submenu:focus .dropdown-menu{
    display: flex;
    flex-direction: column;
    position: absolute !important;
    margin-top: -30px;
    left: 100%;
}

@media (max-width: 992px) {
    .dropdown-menu{
        width: 50%;
    }
    .dropdown-menu .dropdown-submenu{
        width: auto;
    }
}


.box
   {
    width:500px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
   }


 body
   {
    margin:0;
    padding:5;
    background-color:#f1f1f1;
   }


   #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 15px;
  padding: 0px;
  border: 1px solid #ddd;
  margin-bottom: 2px;
}

#myTable {
  background-color: white;
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 12px;
}


#myTable th, #myTable td {
  text-align: left;
  padding: 0px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<body class="body">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img class="img1" src="image/slc_logo.png" width="50px" >
  <h1 class="navbar-brand">Web-based Leave Management System</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage Employee
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
              <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#form_modal"> Add Employee</button>
          </li>

          <li>
              <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#creditsmodal"> Manage Leave Credits</button>
          </li>
        </ul>
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
              <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#formsmodal"> Add Leave Type</button>
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



<br>






<div id="toys-grid">      
      <form name="frmSearch" method="post" action="employeemanagement.php" id="myTable">

      
      <table id="tableID" class="table-bordered"  >
      
        <thead class="">
          
          <th><strong>Employee ID</strong>
            <br>
            <input type="text" id="myInputs" onkeyup="myFunctions()" placeholder="Search for Name.." >
          </th>
          <th><strong>Full Name</strong>
            <br>
            <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for Name.." >
          </th>
          <th><strong>Gender</strong>
            <br>
            <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for Gender.." >
          </th>          
          <th><strong>Civilstatus</strong>
            <br>
            <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search for Civilstatus.." >
          </th>
          <th><strong>Contact Number</strong>
            <br>
            <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search for Contact Number.." >
          </th>
          <th><strong>Address</strong>
            <br>
            <input type="text" id="myInput5" onkeyup="myFunction5()" placeholder="Search for Address.." >
          </th>
          <th><strong>Employee Status</strong>
            <br>
            <input type="text" id="myInput6" onkeyup="myFunction6()" placeholder="Search for Employee Status.." >
          </th>
          <th><strong>Position</strong>
            <br>
            <input type="text" id="myInput7" onkeyup="myFunction7()" placeholder="Search for Position.." >
          </th>
          <th><strong>Action</strong></th>
          
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($result)) {
            foreach($result as $k=>$v) {
              if(is_numeric($k)) {
          ?>
          <tr>
          <td><?php echo $result[$k]["empID"]; ?></td>
          <td><?php echo $result[$k]['firstname']. " " . $result[$k]['middlename']. " " . $result[$k]['lastname']?></td>
          <td><?php echo $result[$k]["gender"]; ?></td>
          <td><?php echo $result[$k]["civilstatus"]; ?></td>
          <td><?php echo $result[$k]["contactnumber"]; ?></td>
          <td><?php echo $result[$k]["address"]; ?></td>
          <td><?php echo $result[$k]["empstatus"]; ?></td>
          <td><?php echo $result[$k]["position"]; ?></td>
            <td align="center" width="80px">
              <button data-toggle="modal" type="button" data-target="#update_modal<?php echo $result[$k]['empID']?>"><img src="image/edit.png" width="18px"></button>
              <button data-toggle="modal" type="button" data-target="#view_modal<?php echo $result[$k]['empID']?>" ><img src="image/view.png" width="18px"></button>

            </td>
          </tr>

          

          <?php
              include 'modal.php';
              include 'vmodal.php';
              }
             }
                    }
          if(isset($result["perpage"])) {
          ?>
          <tr>
          <td colspan="9" align=right> <?php echo $result["perpage"]; ?></td>
          </tr>
          <?php 
        } ?>
        <tbody>
      </table>
      </form> 
    </div>



<div class="modal fade" id="formsmodal" aria-hidden="true">
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



<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="add.php">
          <div class="modal-header">
            <h3>ADD EMPLOYEE</h3>
          </div>
          <div class="modal-body">
            <div class="col-md-10"></div>
            <div class="col-md-20">


              <div class="form-group">
                <label>Employee ID</label>
                <?php
                       $result = "1964";
                  ?> 
                <input name="empID" class="form-control" value="<?php echo $result;?>" size="20" maxlength="8"   required="required"/>
              </div>


              <div class="form-row">
                    <div class="col-md-4 mb-3">
                          <label>First Name</label>
                          <input type="text" name="firstname" class="form-control" required="required" />
                    </div>
                    <div class="col-md-4 mb-3">
                          <label>Middle Name</label>
                          <input type="text" name="middlename" class="form-control" required="required" />
                    </div>
                    <div class="col-md-4 mb-3">
                          <label>Last Name</label>
                          <input type="text" name="lastname" class="form-control" required="required" />
                    </div>
              </div>
              
              <div class="row">
              <div class="col">
                  <label>Gender</label>
                  <select class="form-control" id="gender"  name="gender">
                    <option value=" "></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
              <div class="col">
                  <label>Civilstatus</label>
                  <select class="form-control" id="civilstatus"  name="civilstatus">
                    <option value=" "></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                  </select>
              </div>
              </div>


              
              <div class="form-group">
                <label>Birthdate</label>
                <input type="date" value="1998-01-01" name="bday" class="form-control" required="required" />
              </div>
              <div class="form-group">
                <label>Birth Place</label>
                <input type="text" name="bplace" class="form-control" required="required" />
              </div>


              <div class="row">
              <div class="col">
                  <label>Employee Status</label>
                  <select class="form-control" id="empstatus"  name="empstatus">
                    <option value=" "></option>
                    <option value="Regular">Regular</option>
                    <option value="Contractual">Contractual</option>
                    <option value="Probationary">Probationary</option>
                  </select>
              </div>
              <div class="col">
                   <label>Position</label>
                <input type="text" name="position" class="form-control" required="required" />
              </div>
              </div>

              
              <div class="form-group">
                <label>Contact Number</label>
                <?php
        $res = "09";
      ?> 
                <input name="contactnumber" value="<?php echo $res;?>" maxlength="11" class="form-control" required="required"/>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" required="required"></textarea>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <button name="save" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Save</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
          </div>
          </div>
        </form>
</div></div></div>


  <div class="modal fade" id="creditsmodal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
       <form action="" method="post" enctype="multipart/form-data">  
          <div class="modal-header">
            <h3>ADD CREDITS</h3>
          </div>
          <div class="modal-body">
            <div class="col-md-10"></div>
            <div class="col-md-20">

  


   <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-4 col-form-label">Employee Name:</label>
                  <div class="col-sm-7">
                    <select name="employeename" class="form-control">
                    <?php 
                    include 'connection.php';
                    $sql = "SELECT firstname, middlename, lastname, empID FROM tbl_emp_list WHERE empstatus='Regular'";
                    $sqlvalidate = mysqli_query($conn, $sql);
                    ?>
                    <option value="" selected></option>
                    <?php
                    if (mysqli_num_rows($sqlvalidate) > 0) { 
                    while ($row = mysqli_fetch_assoc($sqlvalidate)) {
                    ?>
                    <option value="<?php echo $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] ; ?>"><?php echo $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] ; ?></option>
                    <?php }
                      } else {
                            echo "Add Employee first!";
                      }
                    ?>
                    </select>
                  </div>
              </div>

<form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
  
   <?php
                            $con = mysqli_connect("localhost","root","","db_wblms");

                            $brand_query = "SELECT * FROM tbl_leave_list";
                            $query_run = mysqli_query($con, $brand_query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $brand)
                                {
                                    ?>
                                    <input type="checkbox" name="techno[]" value="<?= $brand['leavetitle']; ?>" /> <?= $brand['leavetitle']; ?> <br/>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                        ?>
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
   </tr>  
</table>  
</div>  
</form>  
<?php  
if(isset($_POST['sub']))  
{  
$host="localhost";//host name  
$username="root"; //database username  S
$word="";//database word  
$db_name="db_wblms";//database name  
$tbl_name="demo"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  

$employeename=$_POST['employeename']; 
$checkbox1=$_POST['techno'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= ",".$chk1;  
   }  
$in_ch=mysqli_query($con,"insert into demo(employeename, name) values ('$employeename', '$chk')");  
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>  
       
</div></div></div>









    
       <script src="select2.min.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript">

$(".chosen").chosen();




        (function($) {
            $(document).ready(function(){
                var empName = $("#en");
                var empID   = $("#id");

                empName.on("change", function(evt){
                    var eN  = $(this);          
                    var eID = eN.children('option:selected').attr("data-emp-id");
                    empID.val(eID);
                });

               
            });
        })(jQuery);






  
      $(".chosen").chosen();

function myFunctions() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputs");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 2; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 3; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 4; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction5() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 5; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction6() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput6");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 6; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction7() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput7");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 7; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}






</script>

   
</body> 
</html>
