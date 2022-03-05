<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';


    $uid = $_POST['userid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $addl1 = $_POST['addl1'];
    $hno = $_POST['hno'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $qq='';



    $stmt = $con->prepare("select count(*) as count from wc_userinfo where uid=?;");
    $stmt->bind_param("i", $uid); 
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $qq = $row['count'];
      } 
    }

    if($qq==0)
    {
        $stmt = $con->prepare("insert into wc_userinfo (uid, fname, lastname, dob, add_line1, houseno, street, city, state, zipcode, gender, email, contactno) values (?, ?,?, STR_TO_DATE(?, '%Y-%m-%d') , ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("isssssssssssi", $uid, $fname, $lname, $dob, $addl1, $hno, $street, $city, $state, $zipcode, $gender, $email, $contact); 
        header('Location: visitor.php');
    }
    else
    {
        $stmt = $con->prepare("update wc_userinfo set fname=?, lastname=?, dob=STR_TO_DATE(?, '%Y-%m-%d'), add_line1=?, houseno=?, street=?, city=?, zipcode=?, gender=?, contactno=? where uid=?;");
        $stmt->bind_param("sssssssisii", $fname, $lname, $dob, $addl1, $hno, $street, $city, $zipcode, $gender, $contact,$uid);
    }

    $stmt->execute();

    echo '<script type="text/javascript">'; 
echo 'alert("User Information Updated Successfully");'; 
echo 'window.location.href = "visitor.php";';
echo '</script>';
    

?>