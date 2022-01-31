<div class="modal fade" id="view_modal<?php echo $result[$k]['empID']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="query.php">
        <div class="modal-header">
          <h3 class="modal-title">Employee Details</h3>
        </div>
        <div class="modal-body">
           <div class="col-md-10"></div>
            <div class="col-md-20">
            <div class="form-group">
              <label>Employee ID</label>          
              <input type="text" name="empID" value="<?php echo $result[$k]['empID'];?>" class="form-control" readonly/>
            </div>

              <div class="form-row">
                    <div class="col-md-4 mb-3">
                          <label>First Name</label>
                          <input type="text" name="firstname" value="<?php echo $result[$k]['firstname']?>" class="form-control" readonly />
                    </div>
                    <div class="col-md-4 mb-3">
                          <label>Middle Name</label>
                          <input type="text" name="middlename" value="<?php echo $result[$k]['middlename']?>" class="form-control" readonly />
                    </div>
                    <div class="col-md-4 mb-3">
                          <label>Last Name</label>
                          <input type="text" name="lastname" value="<?php echo $result[$k]['lastname']?>" class="form-control" readonly />
                    </div>
              </div>
              
            <!-- <div class="form-group">
              <label>Gender</label>
              <input type="text" name="gender" value="<?php echo $result[$k]['gender']?>" class="form-control" readonly  />
            </div>
            <div class="form-group">
              <label>Civil Status</label>
              <input type="text" name="civilstatus" value="<?php echo $result[$k]['civilstatus']?>" class="form-control" readonly  />
            </div>
            <div class="form-group">
              <label>Birthdate</label>
              <input type="date" name="bday" value="<?php echo $result[$k]['bday']?>" class="form-control" readonly  />
            </div>
            <div class="form-group">
              <label>Birth Place</label>
              <input type="text" name="bplace" value="<?php echo $result[$k]['bplace']?>" class="form-control" readonly  />
            </div>
            <div class="form-group">
              <label>Employee Status</label>
              <input type="text" name="empstatus" value="<?php echo $result[$k]['empstatus']?>" class="form-control" readonly  />
            </div>
            <div class="form-group">
              <label>Position</label>
              <input type="text" name="position" value="<?php echo $result[$k]['position']?>" class="form-control" readonly  />
            </div>
            <div class="form-group">
              <label>Contact Number</label>
              <input type="phone" name="contactnumber" value="<?php echo $result[$k]['contactnumber']?>" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" value="<?php echo $result[$k]['address']?>" class="form-control" readonly/>
            </div> -->
            Remaining Time:
            <p id="remainingtime" ></p>
            <?php
              $emp_id = $result[$k]['empID'];
              $query_leave_credits = mysqli_query($conn,"SELECT * FROM tbl_leavecredits a INNER JOIN tbl_leave_list b on a.leave_id=b.id WHERE a.emp_id='$emp_id'");
              if(mysqli_num_rows($query_leave_credits)>0){
                while($row=mysqli_fetch_assoc($query_leave_credits)){
                  echo "<b>".$row['leavetitle'].": </b>".$row['hrs_remaining']." Hrs and ".$row['mins_remaining']." mins.<br><br>";
                }
              }else{
                echo "No leaves credited yet.";
              }
            ?>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>