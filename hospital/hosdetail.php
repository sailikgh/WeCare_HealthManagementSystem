<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';    $update = false;
?>

<!DOCTYPE html>
<html lang="en">
<title>We Care</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="../../public/home.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="event.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Events</a>
    <a href="book.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Books</a>
    <a href="space.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Study Space</a>
    <a href="subscribe.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Register</a>
    <a href="contact.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    <a href="../../public/index.php?logout='1'" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">We Care</h1>
</header>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h2>Hospital Details : </h2>
              <?php
                      if(isset($_GET['edit'])){
                        $record =  unserialize($_GET['edit']);
                        $update = true;
                        $hosid= $record['hos_id'];
                        $name = $record['hos_name'];
                        $addr = $record['hos_st_address'];
                        $city = $record['city'];
                        $state = $record['state'];
                        $zip = $record['zipcode'];
                    }
              ?>
              <form method="POST">
                  <dl>
                    <dt>First Name : </dt>
                    <dd><input type="text" name="hosname" placeholder="Name" value="<?php echo $name; ?>"></dd>
                  </dl>
                    <br>
                  <dl>
                    <dt>Street Address : </dt>
                    <dd><input type="text" name="hosaddr" placeholder="Address" value="<?php echo $addr; ?>"></dd>
                  </dl>
                    <br>
                   <dl>
                    <dt>City : </dt>
                    <dd><input type="text" name="hoscity" placeholder="City" value="<?php echo $city; ?>"></dd>
                  </dl>
                    <br>
                   <dl>
                    <dt>State : </dt>
                    <dd><input type="text" name="hosstate" placeholder="State" value="<?php echo $state; ?>"></dd>
                  </dl>
                    <br>
                  <dl>
                    <dt>Zip Code : </dt>
                    <dd><input type="text" name="hoszip" placeholder="Zip Code" value="<?php echo $zip; ?>"></dd>
                  </dl>
                    <br>
                    <?php if ($update == true): ?>
                     <button class="btn" type="submit" name="update" >Update</button>
                    <?php else: ?>
                     <button class="btn" type="submit" name="save" >Save</button>
                    <?php endif ?>
                </form>
                <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                           $hosname = $_POST['hosname'];
                           $hosaddr = $_POST['hosaddr'];
                           $hoscity = $_POST['hoscity'];
                           $hosstate = $_POST['hosstate'];
                           $hoszip = $_POST['hoszip'];

                          if(isset($_POST['save'])){

                              $update = false;

                                if (mysqli_connect_errno()){
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    exit();
                                }
                                else{

                                    $stmt = $conn->prepare("insert into wc_hos (hos_name, hos_st_address, city, state, zipcode) values (?, ?, ?, ?, ?)");
                                    $stmt->bind_param("ssssss", $hosname, $hosaddr, $hoscity, $hosstate, $hoszip);

                                    $stmt->execute();

                                    $stmt->close();
                                    $conn->close(); ?>
                                    <meta http-equiv="REFRESH" content="0;url=hossearch.php"> 
                               <?php }
                          }

                          if (isset($_POST['update'])) {

                                if (mysqli_connect_errno()){
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    exit();
                                }
                                else{

                                    $stmt = $conn->prepare("update wc_hos set hos_name=?, hos_st_address=?, city=?, state=?, zipcode=? where hos_id=?");
                                    $stmt->bind_param("sssssi", $hosname, $hosaddr, $hoscity, $hosstate, $hoszip, $hosid);

                                    $stmt->execute();

                                    $stmt->close();
                                    $conn->close(); ?>
                                    <meta http-equiv="REFRESH" content="0;url=hossearch.php"> 
                               <?php }

                          }
                  }         
                ?>
      </div>
  </div>
</div>


<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
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