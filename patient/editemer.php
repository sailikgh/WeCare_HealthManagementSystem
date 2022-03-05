<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   $patid=$_POST['patid'];
   $emerid=$_POST['emerid'];
   $street=$_POST['street'];
   $city=$_POST['city'];
   $state=$_POST['state'];
   $zip=$_POST['zip'];
   $phone=$_POST['phone'];
   $relation=$_POST['relation'];

   echo($patid." ".
   $emerid." ".
   $street." ".
   $city." ".
   $state." ".
   $zip." ".
   $phone." ".
   $relation);

   $stmt=$con->prepare("update wc_emc set emc_phone=?, emc_st_address=?, emc_city=?, emc_state=?, emc_zipcode=? where emc_id=?");
   $stmt->bind_param("isssii",$phone, $street, $city, $state, $zip, $emerid);
   $stmt->execute();

   $stmt=$con->prepare("update wc_pat_emc set relation=? where emc_id=? and pat_id=?");
   $stmt->bind_param("sii",$relation, $emerid, $patid);
   $stmt->execute();

   echo '<script type="text/javascript">'; 
   echo 'alert("Changed Successfully");'; 
   echo 'window.location.href = "viewpatient.php";';
   echo '</script>';

?>