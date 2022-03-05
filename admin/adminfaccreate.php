<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   session_start();
 
   $hos_name = "";
      $stmt = $con->prepare("select concat(doc_fname, ' ', doc_lname) as docname from wc_doctor where doc_id=?;");
      $stmt->bind_param('i', $docid); 
      $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = $result->fetch_assoc())
            { 
                $hos_name = $row['docname'];
            }
      
    }
?>
<!DOCTYPE html>
<html>
<title>Create Doctor</title>

<script type="text/javascript"> 
    function displayForm(c) {
        if (c.value == "F") {

            document.getElementById("ccformContainer").style.visibility = 'visible';
            document.getElementById("paypalformContainer").style.visibility = 'hidden';
        } else if (c.value == "C") {
            document.getElementById("ccformContainer").style.visibility = 'hidden';

            document.getElementById("paypalformContainer").style.visibility = 'visible';
        } else {}
    }

    </script>

</script>
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

<div class="w3-padding-32 w3-theme-d1 w3-center">
    <h3> Doctor Information </h3>
</div>

<div class="w3-padding-5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="createfac.php" method="POST">
      <div class="w3-section">      
        <label>First Name:</label>
        <input class="w3-input" type="text" name="docfname" id="docfname" required>
      </div>
      <div class="w3-section">      
        <label>Last Name:</label>
        <input class="w3-input" type="text" name="docname" id="docname" required>
      </div>
      <div class="w3-section">      
        <label>Hospital Name:</label>
        <select id="hosname" name="hosname" class="w3-input" required>
        <?php

          $stmt = $con->prepare("select * from wc_hos;");
          $stmt->execute();
          $result = $stmt->get_result();
          if(mysqli_num_rows($result) > 0)
          {
            while ($row = $result->fetch_assoc())
            {
              $hosp_name = $row['hos_name'];
              $hos_id=$row['hos_id'];
              echo "<option value = '$hos_id'>$hosp_name</option>";
            }
          echo "</select>";
          }

        ?>
        </select>
      </div>
      <div class="w3-section">      
        <label><b>Office Hours: </b></label>
        <input class="w3-input" type="text" name="ofchr" id="ofchr" required>
      </div>
      <div class="w3-section">      
        <label><b>Office Contact: </b></label>
        <input class="w3-input" type="text" name="ofccon" id="ofccon" required>
      </div>
      <div class="w3-section">      
        <label><b>Personal Contact: </b></label>
        <input class="w3-input" type="text" name="percon" id="percon" required>
      </div>
      <div class="w3-section">      
        <label>Doctor Type</label>
        <input value="F" type="radio" name="formselector" id="formselector" onClick="displayForm(this)"></input>Full Time Doctor
        <br>
        <input value="C" type="radio" name="formselector" id="formselector" onClick="displayForm(this)"></input>Consultant</form>
    <div style="visibility:hidden; position:relative" id="ccformContainer">
    
        <br>
            <label>Enter details :</label>
            <br>
            <br>
            
                <div class="w3-section">      
                <label><b>Hire Date: </b></label>
                <input class="w3-input" type="date" name="hrdate" id="hrdate" value="">
                </div>
                <div class="w3-section">      
                <label><b>Hire End Date: </b></label>
                <input class="w3-input" type="date" name="edate" id="edate" value="">
                </div>
                <div class="w3-section">      
                <label><b>Yearly Compensation: </b></label>
                <input class="w3-input" type="text" name="yrcomp" id="yrcomp" value="">
                </div>
          
      
      </div>
    <div style="visibility:hidden; position:relative"  id="paypalformContainer">
        
            <label>Enter details :</label>
                  <div class="w3-section">      
                <label><b>Contract Start Date: </b></label>
                <input class="w3-input" type="date" name="consdate" id="consdate" value="">
                </div>
                <div class="w3-section">      
                <label><b>Contract End Date: </b></label>
                <input class="w3-input" type="date" name="conedate" id="conedate" value="0000-00-00">
                </div>
                <div class="w3-section">      
                <label><b>Weekly Rate: </b></label>
                <input class="w3-input" type="text" name="wrate" id="wrate" value="">
                </div>
                <div class="w3-section">      
                <label><b>Contract Number: </b></label>
                <input class="w3-input" type="text" name="connum" id="connum" value="">
                </div>
                <div class="w3-section">      
                <label><b>Minimum Work Hours: </b></label>
                <input class="w3-input" type="text" name="minhr" id="minhr" value="">
                </div>
                <div class="w3-section">      
                <label><b>Overtime Rate: </b></label>
                <input class="w3-input" type="text" name="ovrate" id="ovrate" value="">
                </div>
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
