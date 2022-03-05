<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   $treatid=$_GET['id'];

   $stmt=$con->prepare("delete from wc_lab where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

   $stmt=$con->prepare("delete from wc_surgery where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

   $stmt=$con->prepare("delete from wc_drugpresc where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

   $stmt=$con->prepare("delete from wc_treat where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Treatment Deleted");'; 
  echo 'window.location.href = "adminviewapp.php";';
  echo '</script>';

?>