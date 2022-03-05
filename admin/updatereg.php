<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $regid = $_POST['regid'];
    $floor = $_POST['floor'];
    $type = $_POST['type'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $date3 = $_POST['date3'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];

    $app_start = $date3." ".$t1;
    $app_end = $date3." ".$t2;

    $stmt = $con->prepare("update wc_reg set 
    floor=?, 
    bed_no=?, 
    DISCHARGE_DATE=STR_TO_DATE(?, '%Y-%m-%d'), 
    FOLLOW_UP_DATE=STR_TO_DATE(?, '%Y-%m-%d'),
    app_start=STR_TO_DATE(?, '%Y-%m-%d'),
    app_end=STR_TO_DATE(?, '%Y-%m-%d')
    where reg_id=?;");
    $stmt->bind_param("ssssssi", $floor, $type, $date1, $date2, $app_start, $app_end, $regid); 
    $stmt->execute();

    echo '<script type="text/javascript">'; 
echo 'alert("Successfull");'; 
echo 'window.location.href = "adminviewapp.php";';
echo '</script>';
?>

