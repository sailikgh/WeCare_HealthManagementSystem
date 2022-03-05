<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();

    $docid = $_GET['id'];
    $doctype='';

    $stmt = $con->prepare("select concat(doc_fname, ' ', doc_lname) as docname, doc_type from wc_doctor where doc_id=?;");
        $stmt->bind_param('i', $docid);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = $result->fetch_assoc())
            { 
                $docname = $row['docname'];
                $doctype=$row['doc_type'];
            }
        
        }


?>

<!DOCTYPE html>
<html>
<title>Hospital Contact</title>
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

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="..\images\hospitaldisplay.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
</div>

<!-- Pricing Row -->

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>DOCTOR INFORMATION</h2>

    <?php
        
        echo("<h1><b>".$docname."</h1></b> <h3><b> Doctor ID:".$docid."</b></h3>");

        switch ($doctype) 
                {
                    case 'F':
                        $sec='Full Time';
                        break;
                    case 'C':
                        $sec='Consulting';
                        break;

                }

        echo("Doctor Type: ".$sec);
        
        if($doctype=='F')
        {
            echo "<table class='w3-table-all w3-card-4' id='myTable'>
            <tr class='w3-teal'>
                <th>Full Time ID</th>
                <th>Hire Date</th>
                <th>Hire End Date</th>
                <th>Yearly Compensation</th>
      </tr>";
            $stmt = $con->prepare("select * from wc_fulltm_doc where doc_id=?;");
            $stmt->bind_param('i', $docid);
            $stmt->execute();
            $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0)
            {
                while ($row = $result->fetch_assoc())
                { 
                echo "<tr><td>". $row['fulltm_id'] ."</td><td>". $row['hire_sdate'] ."</td><td>". $row['hire_edate'] ."</td><td>". $row['yr_comp'] ."</td></tr>";
            }
            echo "</table>";  
      
            }
        }

        if($doctype=='C')
        {
            echo "<table class='w3-table-all w3-card-4' id='myTable1'>
            <tr class='w3-teal'>
                <th>Contract ID</th>
                <th>Contract Number</th>
                <th>Weekly Rate</th>
                <th>Minimum Work Hours</th>
                <th>Overtime Rate</th>
                <th>Contract Start Date</th>
                <th>Contract End Date</th>
      </tr>";
            $stmt = $con->prepare("select * from wc_con_doc where doc_id=?;");
            $stmt->bind_param('i', $docid);
            $stmt->execute();
            $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0)
            {
                while ($row = $result->fetch_assoc())
                { 
                echo "<tr><td>". $row['con_id'] ."</td><td>". $row['contract_no'] ."</td><td>". $row['wk_rate'] ."</td><td>". $row['min_wkhrs'] ."</td>
                <td>". $row['ort_hrrate'] ."</td><td>". $row['contract_sdate'] ."</td><td>". $row['contract_edate'] ."</td></tr>";
            }
            echo "</table>";  
      
            }
        }

?>

</div>

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Project at NYU Tandon School of Engineering</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>New York, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>+00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>test@test.com</p>
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

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction1() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


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
