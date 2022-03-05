<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

$patid = $_POST['patid'];
$race = $_POST['race'];
$dob = $_POST['dob'];
$blood = $_POST['blood'];
$marital = $_POST['marital'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$stmt = $con->prepare("update wc_patient set pat_dob = STR_TO_DATE(?, '%Y-%m-%d'), pat_race = ?, pat_gender = ?, pat_bldgrp = ?, pat_maritalstat = ?, pat_phone = ?, pat_st_address = ?, pat_city = ?, pat_state = ?, pat_zipcode = ?, up_date = curdate() where pat_id = ?;");
$stmt->bind_param("ssssssssssi", $dob, $race, $gender, $blood, $marital, $phone, $street, $city, $state, $zip, $patid); 
$stmt->execute();
echo "Registered Successfully!";
header("Location: viewpatient.php");
$stmt->close();

?>