<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $deptid = $_POST['deptid'];
    $phone = $_POST['phone'];
    $bldg = $_POST['bldg'];
    $floor = $_POST['floor'];
    $hosid = $_POST['hosid'];

    echo($deptid." ".
    $phone." ".
    $bldg." ".
    $floor." ".
    $hosid);

    $stmt = $con->prepare("select count(*) as count from wc_hos_dept where hos_id=? and dept_id=?;");
    $stmt->bind_param('ii', $hosid, $deptid);
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $count = $row['count'];
      }
      
    }

    if ($count==0)
    {
          $stmt = $con->prepare("insert into wc_hos_dept (dept_phone, dept_bldg, dept_floor, dept_id, hos_id) values (?,?,?,?,?);");
          $stmt->bind_param("issii", $phone, $bldg, $floor, $deptid, $hosid); 
          $stmt->execute();

          echo '<script type="text/javascript">'; 
          echo 'alert("Department Added Successfully");'; 
          echo 'window.location.href = "adminhosp.php";';
          echo '</script>';
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Department Already Exists for this Hospital");'; 
        echo 'window.location.href = "adminhosp.php";';
        echo '</script>';
    }
  

   
    
    
    

?>