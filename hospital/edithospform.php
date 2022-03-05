<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

session_start();

$hosid = $_POST['hosid'];
$hosname = $_POST['hosname'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$admincon = $_POST['admincon'];
$emercon = $_POST['emercon'];
$regcon = $_POST['regcon'];
$gecon = $_POST['gecon'];

$_SESSION['hosid'] = $hosid;

$stmt = $con->prepare("update wc_hos set hos_st_address = ?, city = ?, state = ?, zipcode=?, up_date=now() where hos_id=?;");
$stmt->bind_param('sssii', $street, $city, $state, $zip, $hosid);
$stmt->execute();

$stmt = $con->prepare("delete from wc_hos_specl where hos_id=?;");
$stmt->bind_param('i', $hosid);
$stmt->execute();


if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {

            $stmt = $con->prepare("insert into WC_HOS_SPECL (hos_id, specl_id, up_date) values (?, ?, now());");
            $stmt->bind_param('ii', $hosid, $check);
            $stmt->execute();
    }
}

$stmt = $con->prepare("delete from wc_hos_dept where hos_id=?;");
$stmt->bind_param('i', $hosid);
$stmt->execute();

if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {

            $stmt = $con->prepare("insert into WC_HOS_SPECL (hos_id, specl_id, up_date) values (?, ?, now());");
            $stmt->bind_param('ii', $hosid, $check);
            $stmt->execute();
    }
}

$stmt = $con->prepare("update wc_hos_contact set phone=?, up_date=now() where hos_id=? and phone_section='A';");
$stmt->bind_param('ii', $admincon, $hosid);
$stmt->execute();

$stmt = $con->prepare("update wc_hos_contact set phone=?, up_date=now() where hos_id=? and phone_section='E';");
$stmt->bind_param('ii', $emercon, $hosid);
$stmt->execute();

$stmt = $con->prepare("update wc_hos_contact set phone=?, up_date=now() where hos_id=? and phone_section='G';");
$stmt->bind_param('ii', $gecon, $hosid);
$stmt->execute();

$stmt = $con->prepare("update wc_hos_contact set phone=?, up_date=now() where hos_id=? and phone_section='R';");
$stmt->bind_param('ii', $regcon, $hosid);
$stmt->execute();

echo '<script type="text/javascript">'; 
echo 'alert("Hospital Information Updated. Enter Department Information");'; 
echo 'window.location.href = "edithospform2.php";';
echo '</script>';


?>
