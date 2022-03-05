<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $patid = $_POST['patid'];
    $patname = $_POST['patname'];
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
    $insno = $_POST['insno'];
    $inscomp = $_POST['inscomp'];
    $insno = $_POST['insno'];
    $inscomp = $_POST['inscomp'];
    $insname = $_POST['insname'];
    $per = $_POST['per'];

    $stmt = $con->prepare("update wc_patient set pat_dob=STR_TO_DATE(?, '%Y-%m-%d'), pat_race=?, pat_gender=?, pat_bldgrp=?, pat_maritalstat=?, pat_phone=?, pat_st_address=?, pat_city=?, pat_state=?, pat_zipcode=? where pat_id=?;");
    $stmt->bind_param("sssssisssii",$dob, $race, $gender, $blood, $marital, $phone, $street, $city, $state, $zip, $patid); 
    $stmt->execute();

    $stmt = $con->prepare("update wc_insurance set insur_no=?, insur_name=?, insur_company=?, cover_percent=? where pat_id=?;"); 
    $stmt->bind_param("issii",$insno, $insname, $inscomp, $per, $patid); 
    $stmt->execute();

    echo '<script type="text/javascript">'; 
    echo 'alert("Patient Edited Successfully");'; 
    echo 'window.location.href = "adminpat.php";';
    echo '</script>';
    
    
    

?>