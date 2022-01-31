<?php 
        $message = '';
        if(isset($_POST["import"]))
        {
         if($_FILES["database"]["name"] != '')
         {
          $array = explode(".", $_FILES["database"]["name"]);
          $extension = end($array);
          if($extension == 'sql')
          {
           $connect = mysqli_connect("localhost", "root", "", "db_wblms");
           $output = '';
           $count = 0;
           $file_data = file($_FILES["database"]["tmp_name"]);
           foreach($file_data as $row)
           {
            $start_character = substr(trim($row), 0, 2);
            if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
            {
             $output = $output . $row;
             $end_character = substr(trim($row), -1, 1);
             if($end_character == ';')
             {
              if(!mysqli_query($connect, $output))
              {
               $count++;
              }
              $output = '';
             }
            }
           }
           if($count > 0)
           {
             echo "<script>alert('Database Successfully Imported'); window.location = 'admin.php';</script>";//$message = '<label class="text-danger">There is an error in Database Import</label>';
           }
           else
           {
             echo "<script>alert('Database Successfully Imported'); window.location = 'admin.php';</script>";//$message = '<label class="text-success">Database Successfully Imported</label>';
            //header("location:admin_page.php");

           }
          }
          else
          {
            echo "<script>alert('Invalid File'); window.location = 'admin.php';</script>";//$message = '<label class="text-danger">Invalid File</label>';
          }
         }
         else
         {
          echo "<script>alert('Please Select Sql File'); window.location = 'admin.php';</script>";//$message = '<label class="text-danger">Please Select Sql File</label>';
         }
        }
        ?>



     