<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();
    $userid='';

    $userid = $_GET['id'];
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
    <h3> Payments </h3>
</div>

<!-- Pricing Row -->

<div class="w3-row-padding w3-center w3-padding-64">
    <h2>Past Payments</h2>
    <p></p>

<table class="w3-table-all w3-card-4">
    <tr class="w3-pink">
        <th>Payment ID</th>
        <th>Invoice ID</th>
        <th>Source</th>
        <th>Date</th>
        <th>Payer First Name</th>
        <th>Payer Last Name</th>
        <th>Mode</th>
        <th>Amount</th>
    </tr>

    <?php

        $stmt = $con->prepare("select * from wc_payment where inv_id=?;");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result) == 0)
        {
            echo("No Payments");
        }
        else
        {
            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>". $row['pay_id'] ."</td>
                <td>". $row['inv_id'] ."</td>
                <td>". $row['pay_source'] ."</td>
                <td>". $row['pay_date'] ."</td>
                <td>". $row['payer_fname'] ."</td>
                <td>". $row['payer_lname'] ."</td>
                <td>". $row['pay_mode'] ."</td>
                <td>". $row['pay_amt'] ."</td></tr>"; 
            }
                echo "</table>";
        }

?>


</table>

<div class="w3-row-padding w3-center w3-padding-64">
    <h2>Make New Payment</h2>
    <p></p>

</div>

<div>

<div class="w3-padding-5">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="makepayment.php?id=<?=$userid?>" method="POST">
      <div class="w3-section">      
        <label>Payer's First Name</label>
        <input class="w3-input" type="text" name="fname" id="fname" required>
      </div>
      <div class="w3-section">      
        <label>Payer's Last Name</label>
        <input class="w3-input" type="text" name="lname" id="lname" required>
      </div>
      <div class="w3-section">      
        <label>Source</label>
        <select id="source" name="source" id="source" class="w3-input" required>
            <option value="I">I</option>
            <option value="P">P</option>
        </select>
      </div>
      <div class="w3-section">      
        <label>Mode</label>
        <select id="mode" name="mode" id="mode" class="w3-input" required>
            <option value="CC">Credit Card</option>
            <option value="DC">Debit Crd</option>
            <option value="EF">EF</option>
            <option value="CK">Cheque</option>
        </select>
    </div>
      <div class="w3-section">      
        <label>Amount</label>
        <input class="w3-input" type="text" name="amount" id="amount" required>
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
