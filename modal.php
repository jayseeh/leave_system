<div class="modal fade" id="update_modal<?php echo $result[$k]['empID']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="query.php">
        <div class="modal-header">
          <h3 class="modal-title">Update Employee</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-10"></div>
            <div class="col-md-20">

            <div class="form-group">
              <label>Employee ID</label>          
              <input type="text" name="empID" value="<?php echo $result[$k]['empID'];?>" class="form-control" required="required" readonly/>
            </div>

              <div class="form-row">
                    <div class="col-md-4 mb-3">
                          <label>First Name</label>
                          <input type="text" name="firstname" value="<?php echo $result[$k]['firstname']?>" class="form-control" required="required" />
                    </div>
                    <div class="col-md-4 mb-3">
                          <label>Middle Name</label>
                          <input type="text" name="middlename" value="<?php echo $result[$k]['middlename']?>" class="form-control" required="required" />
                    </div>
                    <div class="col-md-4 mb-3">
                          <label>Last Name</label>
                          <input type="text" name="lastname" value="<?php echo $result[$k]['lastname']?>" class="form-control" required="required" />
                    </div>
              </div>
              <div class="form-row">
                    <div class="col-md-6 mb-4">
                           <label>Gender</label>
                            <select class="form-control" id="gender"  name="gender" value="<?php echo $result[$k]['gender']?>" required="required">
                              <option value=" "></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                    </div>
                    <div class="col-md-6 mb-4">
                          <label>Civil Status</label>
                            <select class="form-control" id="civilstatus"  name="civilstatus" value="<?php echo $result[$k]['civilstatus']?>"  required="required">
                              <option value=" "></option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widowed">Widowed</option>
                            </select>
                    </div>
              </div>
              <div class="form-row">
                    <div class="col-md-6 mb-4">
                           <label>Birthdate</label>
                            <input class="form-control" type="date" name="bday" value="<?php echo $result[$k]['bday']?>" class="form-control" required="required" />
                    </div>
                    <div class="col-md-6 mb-4">
                           <label>Birth Place</label>
                            <input type="text" name="bplace" value="<?php echo $result[$k]['bplace']?>" class="form-control" required="required" />
                    </div>
              </div>
              <div class="form-row">
                    <div class="col-md-6 mb-4">
                           <label>Employee Status</label>
                            <select class="form-control" id="empstatus"  name="empstatus" value="<?php echo $result[$k]['empstatus']?>" required="required">
                              <option value=" "></option>
                              <option value="Regular">Regular</option>
                              <option value="Contractual">Contractual</option>
                              <option value="Probationary">Probationary</option>
                            </select>
                    </div>
                    <div class="col-md-6 mb-4">
                            <label>Position</label>
                             <input type="text" name="position" value="<?php echo $result[$k]['position']?>" class="form-control" required="required" />
                    </div>
              </div>
            
            <div class="form-group">
              <label>Contact Number</label>
              <input type="phone" name="contactnumber" value="<?php echo $result[$k]['contactnumber']?>" class="form-control" required="required" />
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" value="<?php echo $result[$k]['address']?>" class="form-control" required="required" />
            </div>

          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>