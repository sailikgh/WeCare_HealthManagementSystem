<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   session_start();
   
   $regid=$_POST['regid'];
   $hosid=$_POST['hosid'];
   $desc=$_POST['desc'];
   $type=$_POST['type'];
   $sdate=$_POST['sdate'];
   $edate=$_POST['edate'];
   $stat=$_POST['stat'];
   $dis=$_POST['dis'];

   $stmt=$con->prepare("update wc_reg set hos_id=? where reg_id=?");
   $stmt->bind_param("ii",$hosid, $regid);
   $stmt->execute();

   if($dis==NULL)
   {
    $stmt=$con->prepare("insert into wc_treat 
    (treat_type, treat_desc, TREAT_STDATE, TREAT_ENDDATE, treat_status, reg_id) 
    values 
    (?,?,STR_TO_DATE(?, '%Y-%m-%d'),STR_TO_DATE(?, '%Y-%m-%d'),?,?);");
    $stmt->bind_param("sssssi",$type, $desc, $sdate, $edate, $stat, $regid);
   }
   else
   {
    $stmt=$con->prepare("insert into wc_treat 
    (treat_type, treat_desc, TREAT_STDATE, TREAT_ENDDATE, treat_status, dis_id, reg_id) 
    values 
    (?,?,STR_TO_DATE(?, '%Y-%m-%d'),STR_TO_DATE(?, '%Y-%m-%d'),?,?,?);");
    $stmt->bind_param("sssssii",$type, $desc, $sdate, $edate, $stat, $dis, $regid);
   }

   $stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Appointment Assigned Successfully. Assign Doctor and Department");'; 
  echo '</script>';

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
    <h3> Allot Doctor and Department </h3>
</div>

<div class="w3-padding-5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="assignappdocdept.php" method="POST">
      <div class="w3-section">      
        <label><b>Hospital ID <?= $hosid?></b></label>
        <input class="w3-input" type="hidden" name="hosid" id="hosid" value=<?= $hosid?> required>
      </div>
      <div class="w3-section">      
        <label><b>Registration ID <?= $regid?></b></label>
        <input class="w3-input" type="hidden" name="regid" id="regid" value=<?= $regid?> required>
      </div>
      
      <div class="w3-section">      
        <label>Assign Doctor</label>
        <?php
            $stmt = $con->prepare("select a.doc_id, concat(b.doc_fname, ' ', b.doc_lname) as docname, a.hos_id from wc_hos_doc a join wc_doctor b where a.doc_id=b.doc_id and a.hos_id=?;");
            $stmt->bind_param('i', $hosid);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) > 0)
            {
                echo '<select name="docid" id="docid" class="w3-input" required">'; 
                while ($row = $result->fetch_assoc())
                { 
                    echo('<option value="'.$row['doc_id'].'">'.$row['docname'].'</option>');
                }
                echo '</select>';
            }

          ?>
      </div>
      <div class="w3-section">      
        <label>Assign Department</label>
        <?php
            $stmt = $con->prepare("select a.dept_id, b.dept_name from wc_hos_dept a join wc_dept b where a.dept_id=b.dept_id and a.hos_id=?;");
            $stmt->bind_param('i', $hosid);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result) > 0)
            {
                echo '<select name="deptid" id="deptid" class="w3-input" required">'; 
                while ($row = $result->fetch_assoc())
                { 
                    echo('<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>');
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
