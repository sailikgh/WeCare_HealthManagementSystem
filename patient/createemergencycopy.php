<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';

    $patid = $_POST['patid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $relation = $_POST['relation']; 

    $stmt = $con->prepare("select count(*) as count from wc_emc where emc_phone=?");
    $stmt->bind_param("i", $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $qq = $row['count'];
      } 
    }

    if($qq>0)
    {
      $stmt = $con->prepare("select emc_id from wc_emc where emc_phone=?");
      $stmt->bind_param("i", $phone);
      $stmt->execute();
      $result = $stmt->get_result();
      if(mysqli_num_rows($result) > 0)
      {
        while ($row = $result->fetch_assoc())
        {
          $emc_id = $row['emc_id'];
        } 
      }

      $stmt = $con->prepare("insert into wc_pat_emc (relation, pat_id, emc_id) values
      (?, ?, ?);");
      $stmt->bind_param("sii", $relation, $patid, $emc_id);
      $stmt->execute();
      
    }
    else
    {
      $stmt = $con->prepare("insert into wc_emc (emc_fname, emc_lname, emc_phone, emc_st_address, emc_city, emc_state, emc_zipcode) values
      (?, ?, ?, ?, ?, ?, ?);");
      $stmt->bind_param("ssisssi", $fname, $lname, $phone, $street, $city, $state, $zip);
      $stmt->execute();

      $stmt = $con->prepare("select LAST_INSERT_ID() as lastid;");
      $stmt->execute();
      $result = $stmt->get_result();
      if(mysqli_num_rows($result) > 0)
      {
        while ($row = $result->fetch_assoc())
        {
          $emc_id = $row['lastid'];
        } 
      }

      $stmt = $con->prepare("insert into wc_pat_emc (relation, pat_id, emc_id) values
      (?, ?, ?);");
      $stmt->bind_param("sii", $relation, $patid, $emc_id);
      $stmt->execute();

    }

    header("Location: ../patient/viewpatient.php");

?>