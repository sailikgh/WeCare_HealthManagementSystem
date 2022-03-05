<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();

    $userid = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<title>Visitor Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body id="myPage">


<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="admin.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
 
 </div>  
</div>


<div class="w3-padding-32 w3-theme-d1 w3-center">
    <h3> Information </h3>
</div>

<!-- Pricing Row -->

<div class="w3-row-padding w3-center w3-padding-64">
    <h2>Appointment Details</h2>
    <p></p>

<table class="w3-table-all w3-card-4">
    <tr class="w3-pink">
        <th>Registration ID</th>
        <th>Patient ID</th>
        <th>Hospital ID</th>
        <th>Date of Registration</th>
        <th>Registration Type</th>
        <th>Floor</th>
        <th>Bed No</th>
        <th>Discharge Date</th>
        <th>Follow Up Date</th>
        <th>Slot Begins</th>
        <th>Slot Ends</th>
        <th>Edit</th>
        <th>Assign Treatment Slot</th>
        <th>View Treatment Slot</th>
    </tr>

    <?php

        $stmt = $con->prepare("select * from wc_reg where pat_id=?;");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) == 0)
        {
            echo("No Patients Registered");
        }
        else
        {
            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>". $row['reg_id'] ."</td><td>". $row['pat_id'] ."</td>
                <td>". $row['hos_id'] ."</td><td>". $row['reg_date'] ."</td>
                <td>". $row['reg_type'] ."</td><td>". $row['floor'] ."</td>
                <td>". $row['bed_no'] ."</td><td>". $row['DISCHARGE_DATE'] ."</td>
                <td>". $row['FOLLOW_UP_DATE'] ."</td>
                <td>". $row['app_start'] ."</td>
                <td>". $row['app_end'] ."</td>
                <td>"."<a href=editreg.php?id=".$row['reg_id']."><b>Edit</b></a>"."</td>
                <td>"."<a href=assigntreat.php?id=".$row['reg_id']."><b>Assign</b></a>"."</td><td>"."<a href=viewtreat.php?id=".$row['reg_id']."><b>View</b></a>"."</td></tr>"; 
            }
                echo "</table>";
        }
?>


</table>

</div>

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Project at NYU Tandon School of Engineering</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  New York, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width:100%;">

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <p>Advanced Project I ECE-GY 9953</p>
  <p>Developed By: Saili Kulkarni and Sakshi Mishra</p>
  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
