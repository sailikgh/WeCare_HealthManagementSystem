<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();

    $userid = $_SESSION['userid'] ;
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
  <a href="visitor.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>

 </div>  
</div>


<div class="w3-padding-32 w3-theme-d1 w3-center">
    <h3> Information </h3>
</div>

<!-- Pricing Row -->

<div class="w3-row-padding w3-center w3-padding-64">
    <h2>Treatment Details</h2>
    <p></p>

<table class="w3-table-all w3-card-4">
    <tr class="w3-pink">
        <th>Treatment ID</th>
        <th>Patient Name</th>
        <th>Treatment Type</th>
        <th>Treatment Description</th>
        <th>Treatment Start Date</th>
        <th>Treatment End Date</th>
        <th>Treatment Status</th>
        <th>Disease</th>
        <th>Doctor Assigned</th>
        <th>Department Assigned</th>
    </tr>

    <?php

        $stmt = $con->prepare("select * from wc_patient a join wc_reg b join wc_treat c where a.pat_id=b.pat_id and b.reg_id=c.reg_id and user_id=?;");
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
              $stmt1 = $con->prepare("select concat(pat_fname, ' ', pat_lname) as patname from wc_patient where pat_id=?;");
              $stmt1->bind_param("i", $row['pat_id']);
              $stmt1->execute();
              $result1 = $stmt1->get_result();
              while ($row1 = $result1->fetch_assoc())
              { $patname = $row1['patname'];}

                $stmt1 = $con->prepare("select concat(doc_fname, ' ', doc_lname) as docname from wc_doctor where doc_id=?;");
                $stmt1->bind_param("i", $row['doc_id']);
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                while ($row1 = $result1->fetch_assoc())
                { $docname = $row1['docname'];}

                $stmt1 = $con->prepare("select * from wc_dept where dept_id=?;");
                $stmt1->bind_param("i", $row['dept_id']);
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                while ($row1 = $result1->fetch_assoc())
                { $deptname = $row1['dept_name'];}

                $stmt1 = $con->prepare("select * from wc_disease where dis_id=?;");
                $stmt1->bind_param("i", $row['dis_id']);
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                while ($row1 = $result1->fetch_assoc())
                { $disid = $row1['dis_name'];}


                echo "<tr><td>". $row['treat_id'] ."</td>
                <td>". $patname ."</td>
                <td>". $row['treat_type'] ."</td>
                <td>". $row['treat_desc'] ."</td><td>". $row['TREAT_STDATE'] ."</td>
                <td>". $row['TREAT_ENDDATE'] ."</td><td>". $row['treat_status'] ."</td>
                <td>". $disid ."</td><td>". $docname ."</td>
                <td>". $deptname ."</td>
                
                </tr>"; 
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
