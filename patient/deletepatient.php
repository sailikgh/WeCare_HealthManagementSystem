<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

$patid = $_GET['id'];

$stmt = $con->prepare("delete from wc_patient where pat_id=?;");
$stmt->bind_param("i",$patid); 
$stmt->execute();
header("Location: viewpatient.php?=$patid");
$stmt->close();

?>