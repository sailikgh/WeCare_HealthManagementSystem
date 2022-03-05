<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   session_start();
   $patid=$_GET['id'];

   $stmt = $con->prepare("select concat(pat_fname, ' ', pat_lname) as patname from wc_patient where pat_id=?;");
   $stmt->bind_param('i', $patid);
    $stmt->execute();
          $result = $stmt->get_result();
          if(mysqli_num_rows($result) > 0)
          {
            while ($row = $result->fetch_assoc())
            {
              $patname = $row['patname'];
            }
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
    <h3> Patient Information </h3>
</div>

<div class="w3-padding-5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="editpat.php" method="POST">
      <div class="w3-section">      
        <label><b>Patient ID <?= $patid?></b></label>
        <input class="w3-input" type="hidden" name="patid" id="patid" value=<?= $patid?> required>
      </div>
      <div class="w3-section">      
        <label><b>Patient Name <?= $patname?></b></label>
        <input class="w3-input" type="hidden" name="patname" id="lname" required>
      </div>
      <div class="w3-section">      
        <label>Race</label>
        <select id="race" name="race" id="race" class="w3-input" required>
            <option value="American Indian">American Indian</option>
            <option value="Asian">Asian</option>
            <option value="Black/Afr.American">Black/Afr.American</option>
            <option value="Hispanic/Latino">Hispanic/Latino</option>
            <option value="White">White</option>
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
            <option value="U">Single</option>
            <option value="M">Married</option>
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
        <select class="w3-input" name="state" id="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
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
            <option value="U">Other</option>
        </select>
      </div>
      <div class="w3-section">      
        <label>Contact Number</label>
        <input class="w3-input" type="text" name="phone" id="phone" required>
      </div> 
       
      <div class="w3-section">      
        <label>Insurance Number</label>
        <input class="w3-input" type="text" name="insno" id="insno" required>
      </div>
      <div class="w3-section">      
        <label>Insurance Company</label>
        <input class="w3-input" type="text" name="inscomp" id="inscomp" required>
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
