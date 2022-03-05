<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   session_start();
   
   $deptid=$_POST['deptid'];
   $docid=$_POST['docid'];
   $regid=$_POST['regid'];

   $stmt=$con->prepare("update wc_treat set doc_id=?, dept_id=? where reg_id=?");
   $stmt->bind_param("iii",$docid, $deptid, $regid);
   $stmt->execute();


   #$stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Appointment Assigned Successfully");'; 
  echo 'window.location.href = "adminviewapp.php";';
  echo '</script>';

?>