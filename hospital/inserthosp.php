<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

$hosname = $_POST['hosname'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$admincon = $_POST['admincon'];
$emercon = $_POST['emercon'];
$regcon = $_POST['regcon'];
$gecon = $_POST['gecon'];

$hosid="";

$stmt = $con->prepare("insert into wc_hos (hos_name, hos_st_address, city, state, zipcode, up_date) values (?, ?, ?, ?, ?, now());");
$stmt->bind_param('ssssi', $hosname, $street, $city, $state, $zip);
$stmt->execute();



$stmt = $con->prepare("select LAST_INSERT_ID() as lastid;");
$stmt->execute();
$result = $stmt->get_result();

            while ($row = $result->fetch_assoc())
            {
               $hosid= $row['lastid'];
            }


if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            
        $stmt = $con->prepare("insert into WC_HOS_SPECL (hos_id, specl_id, up_date) values (?, ?, now());");
        $stmt->bind_param('ii', $hosid, $check);
        $stmt->execute();
     }
}
            
$stmt = $con->prepare("insert into wc_hos_contact (phone, phone_section, hos_id, up_date) values (?,'A', ?, now());");
$stmt->bind_param('ii', $admincon, $hosid);
$stmt->execute();

$stmt = $con->prepare("insert into wc_hos_contact (phone, phone_section, hos_id, up_date) values (?,'E', ?, now());");
$stmt->bind_param('ii', $emercon, $hosid);
$stmt->execute();

$stmt = $con->prepare("insert into wc_hos_contact (phone, phone_section, hos_id, up_date) values (?,'G', ?, now());");
$stmt->bind_param('ii', $gecon, $hosid);
$stmt->execute();

$stmt = $con->prepare("insert into wc_hos_contact (phone, phone_section, hos_id, up_date) values (?,'R', ?, now());");
$stmt->bind_param('ii', $regcon, $hosid);
$stmt->execute();

header("Location: ../admin/adminhosp.php")
        

?>