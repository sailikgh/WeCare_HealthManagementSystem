<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();
    $username = $_SESSION['username'];
    $name = '       ';
    $address = '                                  ';
    $contact = '           ';
    $dob = '            ';
    $gender = '              ';
    $email = '          ';
    $uid = '          ';

    $stmt = $con->prepare("select concat(a.fname, ' ', a.lastname) as uname, concat(a.add_line1, ' ', houseno, ' ', street, ' ', city, ' ', zipcode) as addr, a.contactno, a.dob, a.gender, b.user_email as email, a.uid from wc_userinfo a join wc_user b where b.user_id=a.uid and b.user_name=?;");    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $name = $row['uname'];
        $address = $row['addr'];
        $contact = $row['contactno'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $email = $row['email'];
        $uid = $row['uid'];
      }
      
    }

    $_SESSION['userid'] = $uid;
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
  <a href="#pricing" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Services</a>
  <a href="viewinvoice.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Invoices & Payments</a>
  
 </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="..\images\hospitaldisplay.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
</div>

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>Welcome <?= $username ?></h2>

<div class="w3-row"><br>

<div class="w3-quarter">
  <a href="adminhosp.php"><img src="..\images\hospitallogo.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity"></a>
  <h3>Hospitals</h3>
  <p>Manage Hospital Details</p>
</div>

<div class="w3-quarter">
<a href="adminfac.php"><img src="..\images\medicalfaculty.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity"></a>
  <h3>Faculty</h3>
  <p>List of Doctors, Nurses and more</p>
</div>

<div class="w3-quarter">
<a href="adminpat.php"><img src="..\images\patient.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity"></a>
  <h3>Patients</h3>
  <p>Manage All Patients</p>
</div>

<div class="w3-quarter">
  <a href="adminviewapp.php"><img src="..\images\hospitallogo.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity"></a>
  <h3>Appointments</h3>
  <p>Manage Appointments and Registration</p>
</div>

</div>
</div>

<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter w3-padding-64 w3-theme-l1">
<h2>User Information</h2>
<p>Please confirm your information is up to date.</p>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <div class="w3-container">
  <p><b>UserID: </b><?= $uid ?></p>
  <p><b>Name: </b><?= $name ?></p>
  <p><b>Date of Birth: </b><?= $dob ?></p>
  <p><b>Permanent Address: </b><?= $address ?></p>
  <p><b>Mobile No.: </b><?= $contact ?></p>
  <p><b>Gender: </b><?= $gender ?></p>
  <p><b>Email: </b><?= $email ?></p>
  </div>
  </div>
</div>
</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
  <a href="./updatepersonalinfo.php" class="w3-button w3-teal"
  style="position:absolute;top:-28px;right:24px">Update Information</a>
</div>



<!-- Pricing Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>SERVICES</h2>
    <p>Manage Services</p><br>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Manage Results</p>
        </li>
          <h2 class="w3-wide">Manage Information regarding Surgery, Labs and Prescription</h2>
          <span class="w3-opacity">Reports</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button onclick="location.href='adminselectreport.php'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Manage Reports</button>
        </li>
      </ul>
    </div>
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
