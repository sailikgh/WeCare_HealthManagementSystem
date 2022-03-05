<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();
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
  <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
  <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Affiliations</a>
  <a href="#pricing" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Services</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Billing<i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">Invoices</a>
      <a href="#" class="w3-bar-item w3-button">Payment Receipts</a>
    </div>
  </div>
 </div>  
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="..\images\hospitaldisplay.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
</div>

<!-- Pricing Row -->

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>HEALTH INSURANCE</h2>
    <p>The most affordable and inclusive insurance providers</p><br>

<table class="w3-table-all w3-card-4">
    <tr class="w3-pink">
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Street Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zipcode</th>
        <th>Contact No.</th>
        <th>Email</th>
    </tr>

    <?php

        $stmt = $con->prepare("select * from wc_ins_prov;");
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>". $row['pid'] ."</td><td>". $row['comp_name'] ."</td><td>". $row['p_stadd'] ."</td><td>". $row['p_city'] ."</td><td>". $row['p_state'] ."</td><td>". $row['p_zipcode'] ."</td><td>". $row['phone'] ."</td><td>".  $row['email'] ."</td></tr>"; 
            }
                echo "</table>";
      
    }

?>

</table>


    <!--
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Appointment</p>
        </li>
          <h2 class="w3-wide">Take medical advice from experts.</h2>
          <span class="w3-opacity">Fix an appointment</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button onclick="location.href='../hospital/hospital.php'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Book Now</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">Rooms</p>
        </li>
          <h2 class="w3-wide">Range of rooms from top hospitals.</h2>
          <span class="w3-opacity">Book a room</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button onclick="location.href='../hospital/rooms.php'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Book Now</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Tests</p>
        </li>
          <h2 class="w3-wide">Clinical Tests at lowest rates.</h2>
          <span class="w3-opacity">Select a plan</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Book Now</button>
        </li>
      </ul>
    </div>
-->
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
