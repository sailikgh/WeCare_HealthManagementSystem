<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   session_start();
   $deptid=$_GET['id'];
   $hosid=$_SESSION['hosid'];
   

   echo($deptid." ".
   $hosid);

  $stmt=$con->prepare("delete from wc_hos_dept where dept_id=? and hos_id=?");
  $stmt->bind_param("ii",$deptid, $hosid);
  $stmt->execute();


   echo '<script type="text/javascript">'; 
   echo 'alert("Deleted Successfully");'; 
   echo 'window.location.href = "adminhosp.php";';
   echo '</script>';

?>