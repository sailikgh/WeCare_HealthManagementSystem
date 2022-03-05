<?php
    include_once '../dbincludes/dbconn.php';
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
      <h2>Search - Hospital : </h2>
              <form method="POST">
                    <table>
                        <tr>
                            <td>Hospital Name : </td>
                            <td><input type="text" name="hosname" placeholder="Enter your search keywords" /></td>
                            <td>City : </td>
                            <td><input type="text" name="hoscity" placeholder="Enter your search keywords" /></td>
                            <td><input type="submit" name="search_btn" value="Search" /></td>
                            <td><input type="button" onclick="location.href='hosdetail.php';" value="New!" /></td>
                        </tr>
                    </table>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if ((isset($_POST['hosname'])) && ($_POST['hosname'] != "") && ((!(isset($_POST['hoscity']))) || 
                            ($_POST['hoscity'] == ""))){
                            $name = $_POST['hosname'];
                            $sql = "select * from wc_hos where hos_name=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $name);
                        }
                        else if ((isset($_POST['hoscity'])) && ($_POST['hoscity'] != "") && ((!(isset($_POST['hosname']))) || 
                            ($_POST['hosname'] == ""))){
                            $city = $_POST['hoscity'];
                            $sql = "select * from wc_hos where city=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $city);
                        }
                        else{
                            $name = $_POST['hosname'];
                            $city = $_POST['hoscity'];
                            $sql = "select * from wc_hos where hos_name=? and city=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss", $name, $city);
                        }

                        if (mysqli_connect_errno()){
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            exit();
                        }
                        else{

                            $stmt->execute();

                            $result = $stmt->get_result();
                            $stmt->close();
                            $conn->close();
                        }
                }?>

                <?php if (mysqli_num_rows($result) > 0) { ?>
                  <div>
                    <div class="w3-container">
                      <h2>Results : </h2>
                        <table class="w3-table w3-striped w3-border w3-centered w3-xlarge">
                        <thead>
                          <tr class="w3-red">
                            <th>Hospital ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>

                        <tr>
                          <td><?php echo $row['hos_id']; ?></td>
                          <td><?php echo $row['hos_name']; ?></td>
                          <td>
                            <?php 
                              $addr = $row['hos_st_address'];
                              $addr .= ",";
                              $addr .= $row['city'];
                              $addr .= ",";
                              $addr .= $row['state'];
                              $addr .= ",";
                              $addr .= $row['zipcode'];
                              echo $addr; ?>
                          </td>
                          <td>
                            <a href="hosdetail.php?edit=<?php echo htmlentities(serialize($row)); ?>" class="btn">Edit</a>
                            <a href="hoscontactdetail.php?edit=<?php echo $row['hos_id']; ?>" class="btn">Add Contact</a>
                            <a href="hoscontact.php?edit=<?php echo $row['hos_id']; ?>" class="btn">Update Contact</a>
                            <a href="hosspec.php?edit=<?php echo $row['hos_id']; ?>" class="btn">Add/Update Specialty</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </table>
                  </div>
                </div>              
           <?php } 
                else {
                        echo "No results to show";
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