<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["submit"])) {
    $query = "UPDATE tbl_emp_list set firstname = '".$_POST["firstname"]."', middlename = '".$_POST["middlename"]."', lastname = '".$_POST["lastname"]."', gender = '".$_POST["gender"]."', civilstatus = '".$_POST["civilstatus"]."', bday = '".$_POST["bday"]."', bplace = '".$_POST["bplace"]."', contactnumber = '".$_POST["contactnumber"]."', address = '".$_POST["address"]."', empstatus = '".$_POST["empstatus"]."', position = '".$_POST["position"]."' WHERE  empID=".$_GET["empID"];
    $result = $db_handle->executeQuery($query);
	if(!$result){
		$message = "Problem in Editing! Please Retry!";
	} else {
		header("Location:employeemanagement.php");
	}
}
$result = $db_handle->runQuery("SELECT * FROM tbl_emp_list WHERE empID='" . $_GET["empID"] . "'");
?>
<link href="style.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function validate() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#firstname").val()) {
		$("#name-info").html("(required)");
		$("#firstname").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#middlename").val()) {
		$("#code-info").html("(required)");
		$("#middlename").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#lastname").val()) {
		$("#category-info").html("(required)");
		$("#lastname").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#gender").val()) {
		$("#price-info").html("(required)");
		$("#gender").css('background-color','#FFFFDF');
		valid = false;
	}	
	if(!$("#civilstatus").val()) {
		$("#stock_count-info").html("(required)");
		$("#civilstatus").css('background-color','#FFFFDF');
		valid = false;
	}	
	return valid;
}
</script>
<form name="frmToy" method="post" action="" id="frmToy" onClick="return validate();">
<div id="mail-status"></div>
<div>
<label style="padding-top:20px;">Name</label>
<span id="name-info" class="info"></span><br/>
<input type="text" name="firstname" id="firstname" class="demoInputBox" value="<?php echo $result[0]["firstname"]; ?>">
</div>
<div>
<label>Code</label>
<span id="code-info" class="info"></span><br/>
<input type="text" name="code" id="code" class="demoInputBox" value="<?php echo $result[0]["code"]; ?>">
</div>
<div>
<label>Category</label> 
<span id="category-info" class="info"></span><br/>
<input type="text" name="category" id="category" class="demoInputBox" value="<?php echo $result[0]["category"]; ?>">
</div>
<div>
<label>Price</label> 
<span id="price-info" class="info"></span><br/>
<input type="text" name="price" id="price" class="demoInputBox" value="<?php echo $result[0]["price"]; ?>">
</div>
<div>
<label>Stock Count</label> 
<span id="stock_count-info" class="info"></span><br/>
<input type="text" name="stock_count" id="stock_count" class="demoInputBox" value="<?php echo $result[0]["stock_count"]; ?>">
</div>
<div>
<input type="submit" name="submit" id="btnAddAction" value="Save" />
</div>
</div>