<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   
   $treatid=$_GET['id'];

   $stmt=$con->prepare("delete from wc_pat_emc where pat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

   $stmt=$con->prepare("delete from wc_insurance where pat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

   $stmt=$con->prepare("select reg_id from wc_reg where pat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();
   $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $reg_id = $row['reg_id'];
      }
      
    }

    $stmt=$con->prepare("select inv_id from wc_invoice where reg_id=?;");
   $stmt->bind_param("i",$reg_id);
   $stmt->execute();
   $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $inv_id = $row['inv_id'];
      }
      
    }

    $stmt=$con->prepare("select pay_id from wc_payment where inv_id=?;");
   $stmt->bind_param("i",$inv_id);
   $stmt->execute();
   $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $inv_id = $row['pay_id'];
      }
      
    }

    $stmt=$con->prepare("select treat_id from wc_invoice where inv_id=?;");
   $stmt->bind_param("i",$inv_id);
   $stmt->execute();
   $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = $result->fetch_assoc())
      {
        $inv_id = $row['pay_id'];
      }
      
    }

   $stmt=$con->prepare("delete from wc_insurance where pat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();



   $stmt=$con->prepare("delete from wc_drugpresc where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

   $stmt=$con->prepare("delete from wc_treat where treat_id=?;");
   $stmt->bind_param("i",$treatid);
   $stmt->execute();

  echo '<script type="text/javascript">'; 
  echo 'alert("Treatment Deleted");'; 
  echo 'window.location.href = "adminviewapp.php";';
  echo '</script>';

?>