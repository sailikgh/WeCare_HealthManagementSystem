<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();

?>

<!DOCTYPE html>
<html>
<title>Faculty</title>
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
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="..\images\hospitaldisplay.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
</div>

<!-- Pricing Row -->

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>FACULTY</h2>
    <p>Manage Information of Associated Faculty</p><br>

<label>Filter by Doctor Name:</label>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Doctor Name.." title="Type in Name">

<label>Filter by Hospital Name:</label>
<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Enter Hospital Name.." title="Type in Name">

<p> </p>


    <table class='w3-table-all w3-card-4' id="myTable">
      <tr class='w3-teal'>
        <th>Doctor ID</th>
        <th>Doctor Name</th>
        <th>Hospital Name</th>
        <th>Hospital Address</th>
        <th>Office Hours</th>
        <th>Office Contact</th>
        <th>Personal Contact</th>

      </tr>

    <?php
        $stmt = $con->prepare("select a.doc_id, concat(a.doc_fname, ' ', a.doc_lname) as docname, a.doc_phone_ofc, a.doc_phone_per, b.ofc_hrs, c.hos_name,  concat(c.hos_st_address, ' ', c.city, ' ', c.state, '- ', zipcode) as addr from wc_doctor a join wc_hos_doc b join wc_hos c where b.doc_id=a.doc_id and c.hos_id=b.hos_id;");
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = $result->fetch_assoc())
            { 
                echo "<tr><td>". $row['doc_id'] ."</td><td>". $row['docname'] ."</td><td>". $row['hos_name'] ."</td><td>". $row['addr'] ."</td><td>". $row['ofc_hrs'] ."</td><td>". $row['doc_phone_ofc'] ."</td><td>". $row['doc_phone_per'] ."</td></tr>";
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
    td = tr[i].getElementsByTagName("td")[2];
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
