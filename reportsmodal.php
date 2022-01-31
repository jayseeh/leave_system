<div class="modal fade" id="reports_modal<?php echo $result[$k]['employeeid']?>" aria-hidden="true">
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
        Employee ID: </label> <input type="text" name="employeeid" id="empid" value="<?php echo $result[$k]['employeeid']?>" class="form-control" readonly />
<label>
        Employee ID: </label> <input type="text" name="employeename" id="empname" value="<?php echo $result[$k]['employeename']?>" class="form-control" readonly /><br>

 Remaining Time:
    <p id="remainingtime" ></p>
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