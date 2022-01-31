<div class="modal fade" id="updateuser_modal<?php echo $result[$k]['employeeid']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="POST" action="update_users_query.php">
        <div class="modal-header">
          <h3 class="modal-title">Update User</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <label>Employee ID</label>
              <input type="text" name="employeeid" value="<?php echo $result[$k]['employeeid']?>" readonly />
            </div>
            <div class="form-group">
              <label>Fullname</label>
              <input type="text" name="fullname" value="<?php echo $result[$k]['fullname']?>" class="form-control" required="required" />
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" value="<?php echo $result[$k]['username']?>" class="form-control" required="required"/>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" value="<?php echo $result[$k]['password']?>" class="form-control" required="required"/>
            </div>
            <div class="form-group">
              <label>User level</label>
              <input type="text" name="userlevel" value="<?php echo $result[$k]['userlevel']?>" class="form-control" required="required"/>    
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