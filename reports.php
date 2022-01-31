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
  
  $employeeid = "";
  $employeename = "";
  $typeofleave = "";
  $hours = "";
  $minutes = "";
  $todate = "";
  $fromdate = "";
  $datefiled = "";
  $reason = "";

  
  $queryCondition = "";
  if(!empty($_POST["search"])) {
    foreach($_POST["search"] as $k=>$v){
      if(!empty($v)) {

        $queryCases = array("employeeid", "employeename","typeofleave", "hours", "minutes", "todate", "fromdate", "datefiled", "reason");
        if(in_array($k,$queryCases)) {
          if(!empty($queryCondition)) {
            $queryCondition .= " AND ";
          } else {
            $queryCondition .= " WHERE ";
          }
        }
        switch($k) {
          case "employeeid":
            $employeeid = $v;
            $queryCondition .= "employeeid LIKE '" . $v . "%'";
            break;
          case "employeename":
            $employeename = $v;
            $queryCondition .= "employeename LIKE '" . $v . "%'";
            break;
          case "typeofleave":
            $typeofleave = $v;
            $queryCondition .= "typeofleave LIKE '" . $v . "%'";
            break;
          case "hours":
            $hours = $v;
            $queryCondition .= "hours LIKE '" . $v . "%'";
            break;
        }
      }
    }
  }
  $orderby = " ORDER BY employeeid desc"; 
  $sql = "SELECT * FROM tbl_leave_list INNER JOIN tbl_leaveform on tbl_leave_list.id=tbl_leaveform.typeofleave " . $queryCondition;
  $href = 'reports.php';          
    
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




<title>Reports</title>
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
  font-size: 30px;
  font-weight: bold;
  color: black;
}

.header-a {
  font-family: "Arial";
  font-size: 16px;
  font-weight: bold;
  color: black;
}


.header-b {
  font-family: "Arial";
  font-size: 13px;
  color: #29465B;
  float: right;
  margin-top: 15px;

}
.header-c {
  font-family: "Bookman Oldstyle";
  font-size: 20px;
  font-weight: bold;
  color: #29465B;
  text-shadow: 1px 1px 4px #F8F8FF;
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
  width: 90%;
  border: 1px solid #ddd;
  font-size: 14px;
   margin-left: 70px;
}


#myTable th, #myTable td {
  text-align: left;
  padding: 0%;
  width: 10%;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}




@media print {
    body * {
      visibility: hidden;
    }
    .modal-content * {
      visibility: visible;
      overflow: visible;
    }
    .main-page * {
      display: none;
    }
    .header{
      font-size: 60px;
    }
    .header1{
      font-size: 30px;
    }
    .img1
    {
      width: 100px;
    }
    .img2{
      width: 100px;
    }
    .header-c{
      font-size: 60px;
    }
    .btn{
      visibility: hidden;
    }
    .modal-title{
      visibility: hidden;
    }
    .close{
      visibility: hidden;
    }
    .modal {
      position: absolute;
      left: 0;
      top: 0;
      margin: 0;
      padding: 0;
      visibility: visible;
      overflow: visible !important; /* Remove scrollbar for printing. */
    }
    .modal-dialog {
      visibility: visible !important;
      overflow: visible !important; /* Remove scrollbar for printing. */
      max-width: 100%; width: 100%;
      max-height: 100%; height: 100%;
      font-size: 45px;
    }
    
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

<h3>List of Employees Filed for Leave</h3>



<div id="toys-grid">      
      <form name="frmSearch" method="post" action="reports.php" id="myTable">

    
      <table id="tableID" class="table-bordered" align="center" >
      
        <thead class="">
          <tr><th colspan="10"><input type="text" id="myInputs" onkeyup="myFunctions()" placeholder="Search for Name.." style="width: 400px;"></th></tr>

          <th><strong>Employee ID</strong>
          </th>
          <th><strong>Full Name</strong>
          </th>
          <th><strong>Type of Leave</strong>
          </th>          
          <th><strong>Hours</strong>
          </th>
          <th><strong>Minutes</strong>
          </th>
          <th><strong>From Date</strong>
          </th>
          <th><strong>To Date</strong>
          </th>
          <th><strong>Date Filed</strong>
          </th>
          <th><strong>Reason</strong>
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
          <td id="id"><?php echo $result[$k]["employeeid"]; ?></td>
          <td id="name"><?php echo $result[$k]["employeename"]; ?></td>
          <td><?php echo $result[$k]["leavetitle"]; ?></td>
          <td><?php echo $result[$k]["hours"]; ?></td>
          <td><?php echo $result[$k]["minutes"]; ?></td>
          <td><?php echo $result[$k]["todate"]; ?></td>
          <td><?php echo $result[$k]["fromdate"]; ?></td>
          <td><?php echo $result[$k]["datefiled"]; ?></td>
          <td><?php echo $result[$k]["reason"]; ?></td>
            <td align="center" width="50px">
             <center><button data-toggle="modal" type="button" id="viewemp" data-target="#reports_modal<?php echo $result[$k]['employeeid']?>" ><img src="image/view.png" width="18px"></button></center>
            </td>
          </tr>

          

          <?php
              include 'reportsmodal.php';
              }
             }
                    }
          if(isset($result["perpage"])) {
          ?>
          <tr>
          <td colspan="10" align=right> <?php echo $result["perpage"]; ?></td>
          </tr>
          <?php 
        } ?>
        <tbody>
      </table>
      </form> 
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

    
       <script src="select2.min.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript">


$(document).ready(function(){

  $(document).on('click', '#viewemp', function(){
        
        var id = $(this).val();
        var name = $('#'+id).children('td[id = name]').text();

        $("#empid").text(id);
        $("#empname").text(name);
        $("#opener").click();

        $.ajax({
          url:"timeleft.php",
          type:'POST',
          data:{
            id: id,
          },
          success:function(data){
            $('#remainingtime').html(data);//run u man,nakitam ??;)
          }
        });

      });

  $(document).on('change', '#typeofleave', function(){
        
        var leave = $(this).val();
        var id = $('#empid').text();

        $.ajax({
          url:"timecheck.php",
          type:'POST',
          data:{
            id: id,
            leave: leave,
          },
          success:function(data){
            $('#remainingtime').html(data);
          }
        });

      });

});




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




</script>

   
</body> 
</html>


