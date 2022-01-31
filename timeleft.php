<?php 
          include 'connection.php';
          $employeeid = $_POST['id'];
          $sql = "SELECT * FROM tbl_leave_list";
          $sqlvalidate = mysqli_query($conn, $sql);
          
          if (mysqli_num_rows($sqlvalidate) > 0) { 
            while ($row = mysqli_fetch_assoc($sqlvalidate)) {
              
              $lvt = $row['leavetitle'];
              echo "<b>".$lvt."</b> - ";
              $sqlrecord = "SELECT * FROM tbl_leave_record WHERE emp_id='$employeeid' AND leavetitle='$lvt' ORDER BY ID DESC LIMIT 1";
      $record = mysqli_query($conn, $sqlrecord);
      $recordrow=mysqli_fetch_array($record);

      if (mysqli_num_rows($record) > 0){
      echo $recordrow['remaining_hrs']."Hrs and ".$recordrow['remaining_mins']."Mins left.";
      }else{
      $sqlleave1 = "SELECT * FROM tbl_leave_list WHERE leavetitle='$lvt'";
        $leave1 = mysqli_query($conn, $sqlleave1);
        $leaverow = mysqli_fetch_array($leave1);

        echo $leaverow['hours']."Hrs and ".$leaverow['minutes']."Mins left.";
      }
            ?><br>
          <?php }
          } else {
          echo "Add Leave first!";
          }
        ?> 