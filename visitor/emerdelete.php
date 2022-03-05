<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    session_start();
    $patid=$_SESSION['patid'];
    $emerid=$_GET['id'];

    $stmt = $con->prepare("delete from wc_pat_emc where pat_id=? and emc_id=?");
    $stmt->bind_param("ii",$patid, $emerid); 
    $stmt->execute();

    echo '<script type="text/javascript">'; 
    echo 'alert("Contact Deleted Successfully");'; 
    echo 'window.location.href = "viewpatient.php";';
    echo '</script>';
    
    
    

?>