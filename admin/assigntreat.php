<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   session_start();
   $patid=$_GET['id'];

   $stmt = $con->prepare("select * from wc_reg where reg_id=?;");
   $stmt->bind_param('i', $patid);
    $stmt->execute();
          $result = $stmt->get_result();
          if(mysqli_num_rows($result) > 0)
          {
            while ($row = $result->fetch_assoc())
            {
             $datereq = $row['DISCHARGE_DATE'];
            }
          }
?>
<!DOCTYPE html>
<html>
<title>Treatment Assign</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<body id="myPage">



<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="admin.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
  
  </div>
 </div>

  
</div>

<div class="w3-padding-32 w3-theme-d1 w3-center">
    <h3> Confirm Registration Status and Assign Treatment Slot </h3>
</div>

<div class="w3-padding-5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="assignapp.php" method="POST">
      <div class="w3-section">      
        <label><b>Registration ID <?= $patid?></b></label>
        <input class="w3-input" type="hidden" name="regid" id="regid" value=<?= $patid?> required>
      </div>
      
      <div class="w3-section">      
        <label>Assign Hospital</label>
        <?php
            $stmt = $con->prepare("select hos_id, hos_name from wc_hos;");
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) > 0)
            {
                echo '<select name="hosid" id="hosid class="w3-input" required">'; 
                while ($row = $result->fetch_assoc())
                { 
                    echo('<option value="'.$row['hos_id'].'">'.$row['hos_name'].'</option>');
                }
                echo '</select>';
            }

          ?>
      </div>
      <div class="w3-section">      
        <label>Treatment Description</label>
        <input class="w3-input" type="text" name="desc" id="desc" required>
      </div>
      <div class="w3-section">      
        <label>Treatment Type</label>
        <select id="type" name="type" class="w3-input" required>
            <option value="L">Lab</option>
            <option value="D">Drug Prescription</option>
            <option value="S">Surgery</option>
            <option value="C">Undefined</option>
            </select>
      </div>
      <div class="w3-section">      
        <label>Treatment Start Date</label>
        <input class="w3-input" type="date" name="sdate" id="sdate" required>
      </div>
      <div class="w3-section">      
        <label>Treatment End Date</label>
        <input class="w3-input" type="date" name="edate" id="edate" required>
      </div>
      <div class="w3-section">      
        <label>Treatment Status</label>
        <select id="stat" name="stat" class="w3-input" required>
            <option value="CP">Complete</option>
            <option value="FU">Follow Up</option>
            <option value="TD">Terminated</option>
            <option value="IP">Confirmed or In Progress</option>
            </select>
      </div>
      <div class="w3-section">      
        <label>Select Disease</label>
        <?php
            $stmt = $con->prepare("select * from wc_disease;");
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) > 0)
            {
                echo '<select name="dis" id="dis" class="w3-input">'; 
               
                while ($row = $result->fetch_assoc())
                { 
                    echo('<option value="'.$row['dis_id'].'">'.$row['dis_name'].'</option>');
                }
                echo '</select>';
            }

          ?>
      </div>
 
      <button type="submit" class="w3-button w3-right w3-theme">Register</button>
      </form>
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
