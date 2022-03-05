<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    session_start();
    $userid='';
    $userid = $_GET['id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $source = $_POST['source'];
    $mode = $_POST['mode'];
    $amount = $_POST['amount'];

    $stmt = $con->prepare("insert into wc_payment (pay_source, pay_amt, pay_date, payer_fname, payer_lname, pay_mode, inv_id, up_date) values (?, ?, curdate(), ?,?, ?, ?, curdate());");
    $stmt->bind_param("sisssi", $source, $amount, $fname, $lname, $mode, $userid); 
    $stmt->execute();
    header("Location: payment.php?id=$userid")
?>