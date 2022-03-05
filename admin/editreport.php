<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   $treatid=$_POST['treatid'];
   $type=$_POST['type'];
   $date=$_POST['date'];
   $res=$_POST['res'];
   $lab=$_POST['lab'];

   $stmt=$con->prepare("update wc_lab set lab_name=?, test_type=?, test_date= STR_TO_DATE(?, '%Y-%m-%d'), test_result=? where treat_id=?;");
   $stmt->bind_param("ssssi",$lab, $type, $date, $res, $treatid);
   $stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Lab Report Edited");'; 
  echo 'window.location.href = "adminlab.php";';
  echo '</script>';

?>