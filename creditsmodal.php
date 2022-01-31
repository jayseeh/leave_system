<div class="modal fade" id="credits_modal<?php echo $result[$k]['empID']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
         <form method="POST" action="addcredits.php">
        <div class="modal-header">
          <h3 class="modal-title">Update Employee</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-10"></div>
            <div class="col-md-20">

            <form action="applyleave.php" method="POST" onsubmit="return confirmSave()" style="width: 80%;" class="inline">


       <h3>Record Leave Application</h3>


            <div class="form-row">
                    <label class="col-sm-3 col-form-label"> Employee ID:</label>
                    <div class="col-md-3">
                    <input type="text" name="employeeid" 
                        id="id" class="form-control"
                         value="" readonly="">
                    </div>   
            </div>

             <div class="form-group row">
                      <label for="colFormLabel" class="col-sm-3 col-form-label">Employee Name:</label>
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
                echo "<option value='{$row["firstname"]} {$row["middlename"]} {$row["lastname"]}' data-emp-id='{$row["empID"]}'>";
                echo $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] ;"</option>";
            }
        ?>
    </select>
                   
                  </div>
              </div>






              <div class="form-group">
               <label><b>Select Leave</b></label><br>
    
               <?php 
                    include 'connection.php';
                    $sql = "SELECT * FROM tbl_leave_list";
                    $sqlvalidate = mysqli_query($conn, $sql);
                    ?>
               <?php
                    if (mysqli_num_rows($sqlvalidate) > 0) { 
                    while ($row = mysqli_fetch_assoc($sqlvalidate)) {
                    ?>
                    <input type="checkbox" name="leave[]" id="leave" value="<?php echo $row['leavetitle']; ?>"><?php echo $row['leavetitle']; ?><br>
                    <?php }
                      } else {
                            echo "Add Leave first!";
                      }
                    ?>               
    </div>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
            <button name="save" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Save</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
          </div>
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

                empName.on("change", function(evt){
                    var eN  = $(this);          
                    var eID = eN.children('option:selected').attr("data-emp-id");
                    empID.val(eID);
                });

               
            });
        })(jQuery);
    </script>