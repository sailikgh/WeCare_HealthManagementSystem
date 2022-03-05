<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    $id = $_GET['id'];
    $fname = '';
    $lname='';

    $stmt = $con->prepare("select pat_fname, pat_lname from wc_patient where pat_id=?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc())
        {
          $fname = $row['pat_fname'];
          $lname= $row['pat_lname'];
        }
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
  <a href="visitor.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
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

<div class="w3-padding-32 w3-theme-d1 w3-center">
    <h3> Update Patient Information </h3>
</div>

<div class="w3-padding-5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="updatepatient.php" method="POST">
      <div class="w3-section">      
      <label>Patient ID<b> <?= $id ?></b></label>
        <input class="w3-input" type="hidden" name="patid" id="patid" value=<?= $id ?> required>
      </div>
      <div class="w3-section">      
        <label>First Name <b> <?= $fname ?></b></label>
        <input class="w3-input" type="hidden" name="fname" id="fname" value=<?= $fname ?> required>
      </div>
      <div class="w3-section">      
        <label>Last Name <b> <?= $lname ?></b></label>
        <input class="w3-input" type="hidden" name="lname" id="lname" value=<?= $lname ?> required>
      </div>
      <div class="w3-section">      
        <label>Race</label>
        <select id="race" name="race" id="race" class="w3-input" required>
            <option value="American Indian or Alaska Native">American Indian or Alaska Native</option>
            <option value="Asian">Asian</option>
            <option value="Black or African American">Black or African American</option>
            <option value="Hispanic or Latino">Hispanic or Latino</option>
            <option value="Native Hawaiian or Other Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
            <option value="White">White</option>
            <option value="Prefer Not to Mention">Prefer Not to Mention</option>
        </select>
      </div>
      <div class="w3-section">      
        <label>Date of Birth</label>
        <input class="w3-input" type="date" name="dob" id="dob" required>
      </div>
      <div class="w3-section">      
        <label>Blood Group</label>
        <select id="blood" name="blood" class="w3-input" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
      </div>
      <div class="w3-section">      
        <label>Marital Status</label>
        <select id="marital" name="marital" class="w3-input" required>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widowed">Widowed</option>
            <option value="Divorced">Divorced</option>
        </select>
      </div>
      <div class="w3-section">      
        <label>Street Address</label>
        <input class="w3-input" type="text" name="street" id="street" required>
      </div>
      <div class="w3-section">      
        <label>City</label>
        <input class="w3-input" type="text" name="city" id="city" required>
      </div>
      <div class="w3-section">      
        <label>State</label>
        <input class="w3-input" type="text" name="state" id="state"required>
      </div>
      <div class="w3-section">      
        <label>ZipCode</label>
        <input class="w3-input" type="text" name="zip" id="zip" required>
      </div>
      <div class="w3-section">      
        <label>Gender</label>
        <select id="gender" name="gender" class="w3-input" required>
            <option value="F">Female</option>
            <option value="M">Male</option>
            <option value="O">Other</option>
        </select>
      </div>
      <div class="w3-section">      
        <label>Contact Number</label>
        <input class="w3-input" type="text" name="phone" id="phone" required>
      </div> 
      <div class="w3-section">      
        <label>Insurance ID</label>
        <input class="w3-input" type="text" name="insid" id="insid" required>
      </div> 
      <div class="w3-section">      
        <label>Insurance Company</label>
        <select id="inscomp" name="inscomp" class="w3-input" required>
        <?php

          $stmt = $con->prepare("select * from wc_ins_prov;");
          $stmt->execute();
          $result = $stmt->get_result();
          if(mysqli_num_rows($result) > 0)
          {
            while ($row = $result->fetch_assoc())
            {
              $hosp_name = $row['comp_name'];
              echo "<option value = '$hosp_name'>$hosp_name</option>";
            }
          echo "</select>";
          }

        ?>
        </select>
      </div> 
      <div class="w3-section">      
        <label>Insurance Name</label>
        <input class="w3-input" type="text" name="insname" id="insname" required>
      </div> 
      <div class="w3-section">      
        <label>Insurance Cover Percentage</label>
        <input class="w3-input" type="text" name="per" id="per" required>
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
