
<?php  
if(isset($_POST['submit']))  
{  
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="db_wblms";//database name  
$tbl_name="tbl_leavecredits"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  
$checkbox1=$_POST['leave'];  

$employeename=$_POST['employeename'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($con,"INSERT INTO tbl_leavecredits (employeename, leave) values ('$employeename', '$chk')");  
if($in_ch==0)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>

