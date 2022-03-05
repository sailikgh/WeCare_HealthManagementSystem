<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
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
    $usern = $_POST['usern'];
    $insno = $_POST['insno'];
    $inscomp = $_POST['inscomp'];
    $insno = $_POST['insno'];
    $inscomp = $_POST['inscomp'];
    $insname = $_POST['insname'];
    $per = $_POST['per'];

    $stmt = $con->prepare("insert into wc_patient (pat_fname, pat_lname, pat_dob, pat_race, pat_gender, pat_bldgrp, pat_maritalstat, pat_phone, pat_st_address, pat_city, pat_state, pat_zipcode, user_id) values (
        ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param("sssssssisssii",$fname, $lname, $dob, $race, $gender, $blood, $marital, $phone, $street, $city, $state, $zip, $usern); 
    $stmt->execute();

    $stmt = $con->prepare("select LAST_INSERT_ID() as lastid;");
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = $result->fetch_assoc())
            {
              $pat_id = $row['lastid'];
            }
    }

    $stmt = $con->prepare("insert into wc_insurance (insur_no, insur_name, insur_company, cover_percent, pat_id) values (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("isssi",$insno, $insname, $inscomp, $per, $pat_id); 
    $stmt->execute();

    echo '<script type="text/javascript">'; 
    echo 'alert("Patient Added Successfully");'; 
    echo 'window.location.href = "adminpat.php";';
    echo '</script>';
    
    
    

?>