<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $patientid = $_POST['patientid'];
    $floor = $_POST['floor'];
    $bed_no = $_POST['bed_no'];
    $dob = $_POST['dob'];
    $aptype = $_POST['aptype'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];

    $d1 = $dob." ".$t1;
    $d2 = $dob." ".$t2;

    $stmt = $con->prepare("insert into wc_reg(reg_date, reg_type, floor, bed_no, discharge_date, follow_up_date, pat_id, up_date) values (now(), ?, ?, ?, str_to_date (?,'%Y-%m-%d %H:%i'), str_to_date (?,'%Y-%m-%d %H:%i'),?, now());");
    $stmt->bind_param("sssssi", $aptype, $floor, $bed_no, $d1, $d2, $patientid); 
    if(!$stmt->execute())
       {
           echo("error");
       }
       else
       {
          echo "Registered Successfully!";
         $stmt->close();
        }
    
    

?>