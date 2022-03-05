<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   $treatid=$_GET['id'];

   $stmt=$con->prepare("delete from wc_lab where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Lab Report Deleted");'; 
  echo 'window.location.href = "adminlab.php";';
  echo '</script>';

?>