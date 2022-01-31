<div class="modal fade" id="regular_modal<?php echo $result[$k]['empID']?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="query.php">
        
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Summary of Remaining Leaves</h6>
        <?php  
        echo "DATE: ".date("F d, Y"); 
        ?> 
      </div>
              
        
    
      <div id="printThis">
      <div class="modal-body"> 
        <div class="col-md-10"></div>
            <div class="col-md-20">
  <p class="header" align="center">
  <img class="img1" src="image/slc_logo.png" width="50px" /> Saint Louis College <img class="img2" src="image/cicmlogo.png" width="50px" /></p>
<p class="header1" align="center">2500 City of San Fernando, La Union
</p>
<hr>
        <h5 class="header-c" align="center">Summary of Remaining Leaves</h5>
        <br>
<label align="left">
        Employee ID: </label> <input type="text" name="empID" id="empid" value="<?php echo $result[$k]['empID']?>" class="form-control" readonly />
<label>
        Employee ID: </label> <input type="text" name="employeename" id="empname" value="<?php echo $result[$k]['firstname']. " " . $result[$k]['middlename']. " " . $result[$k]['lastname']?>" class="form-control" readonly /><br>

 Remaining Time:
    <p id="remainingtime" ></p>
    <?php
      $emp_id = $result[$k]['empID'];
      $query_leave_credits = mysqli_query($conn,"SELECT * FROM tbl_leavecredits a INNER JOIN tbl_leave_list b on a.leave_id=b.id WHERE a.emp_id='$emp_id'");
      if(mysqli_num_rows($query_leave_credits)>0){
        while($row=mysqli_fetch_assoc($query_leave_credits)){
          echo "<b>".$row['leavetitle'].": </b>".$row['hrs_remaining']." Hrs and ".$row['mins_remaining']." mins.<br>";
        }
      }else{
        echo "No leaves credited yet.";
      }
    ?>
      </div>
      </div>
      
      </div>
        


        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <a href="javascript:window.print()" class="btn btn-primary pull-right">Print</a>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
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
            $('#remainingtime').html(data);
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
</script>