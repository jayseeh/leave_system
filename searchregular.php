<?php
	require 'connection.php';
	if(ISSET($_POST['search'])){
?>
<center>
	<table class="table table-bordered" style="width: 600px;" >
		<thead class="alert-success" style="background-color:skyblue;">
			<tr>
        	  <th>Employee ID</th>
         	  <th>Fullname</th>
        	  <th>Actions</th>
			</tr>
		</thead>
		<tbody style="background-color:#fff;">
			

			<?php
          require 'connection.php';
          $keyword = $_POST['keyword'];

          // query
          $query = mysqli_query($conn, "SELECT * FROM `tbl_emp_list` WHERE (`empID` LIKE '%$keyword%' or `firstname` LIKE '%$keyword%' or `middlename` LIKE '%$keyword%' or `lastname` LIKE '%$keyword%' or `gender` LIKE '%$keyword%' or `civilstatus` LIKE '%$keyword%' or `bday` LIKE '%$keyword%' or `bplace` LIKE '%$keyword%' or `contactnumber` LIKE '%$keyword%' or `address` LIKE '%$keyword%' or `empstatus` LIKE '%$keyword%' or `position` LIKE '%$keyword%') AND (empstatus = 'Regular')" ) or die(mysqli_error());
          while($fetch = mysqli_fetch_array($query)){
        ?>


			<tr>
				<td><?php echo $fetch['empID']?></td>
          		<td><?php echo $fetch['firstname']. " " . $fetch['middlename']. " " . $fetch['lastname']?></td>
          		<td align="center"><button class="btn btn-dark btn-sm" data-toggle="modal" type="button" data-target="#view_modal<?php echo $fetch['empID']?>">View</button></td>
			</tr>
 
 
			<?php
          include 'vmodal.php';
          }
        ?>
		</tbody>
	</table>
<?php		
	}else{
?>
    <table class="table table-bordered" style="width: 600px;">
        
      <thead class="alert-success" style="background-color:skyblue;">
        <tr>
          <th>Employee ID</th>
          <th>Fullname</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody style="background-color:#fff;">
        <?php
          require 'connection.php';
          $query = mysqli_query($conn, "SELECT * FROM `tbl_emp_list` WHERE empstatus = 'Regular'") or die(mysqli_error());
          while($fetch = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $fetch['empID']?></td>
          <td><?php echo $fetch['firstname']. " " . $fetch['middlename']. " " . $fetch['lastname']?></td>
          <td align="center"><button class="btn btn-dark btn-sm" data-toggle="modal" type="button" data-target="#view_modal<?php echo $fetch['empID']?>">View</button></td>
        </tr>

         <?php
          include 'vmodal.php';
          }
        ?>
      </tbody>
    </table>


<?php
	}
?>