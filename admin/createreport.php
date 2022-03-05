<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   $treatid=$_POST['treatid'];
   $type=$_POST['type'];
   $date=$_POST['date'];
   $res=$_POST['res'];
   $lab=$_POST['lab'];


   echo($treatid." ".
   $type." ".
   $date." ".
   $res." ".
   $lab);

   $stmt=$con->prepare("insert into wc_lab (treat_id, lab_name, test_type, test_date, test_result)
   values
   (?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?);");
   $stmt->bind_param("issss", $treatid, $lab, $type, $date, $res);
   $stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Lab Report Added");'; 
  echo 'window.location.href = "adminlab.php";';
  echo '</script>';

?>