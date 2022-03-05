<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
   session_start();
   
   $docid=$_POST['docid'];
   $docname=$_POST['docname'];
   $hosname=$_POST['hosname'];
   $ofchr=$_POST['ofchr'];
   $connum=$_POST['connum'];
   $ofccon=$_POST['ofccon'];
   $percon=$_POST['percon'];
   $formselector=$_POST['formselector'];
   $hrdate=$_POST['hrdate'];
   $edate=$_POST['edate'];
   if($edate==NULL)
   {
      echo("Nullvalue");
   }
   $yrcomp=$_POST['yrcomp'];
   $consdate=$_POST['consdate'];
   $conedate=$_POST['conedate'];
   $wrate=$_POST['wrate'];
   $minhr=$_POST['minhr'];
   $ovrate=$_POST['ovrate'];
   
   echo($docid." ".$docname." ".$hosname." ".
   $ofchr." ".
   $ofccon." ".
   $percon." ".
   $formselector." ".
   $hrdate." ".
   $edate." ".
   $yrcomp." ".
   $consdate." ".
   $conedate." ".
   $wrate." ".
   $minhr." ".
   $ovrate." ");

   $stmt=$con->prepare("update wc_doctor set doc_type=?, doc_phone_ofc=?, doc_phone_per=? where doc_id=?");
   $stmt->bind_param("siii",$formselector, $ofccon, $percon, $docid);
   $stmt->execute();

   $stmt=$con->prepare("delete from wc_hos_doc where doc_id=?");
   $stmt->bind_param("i",$docid);
   $stmt->execute();

   $stmt=$con->prepare("insert into wc_hos_doc (hos_id, doc_id, ofc_hrs) values (?,?,?);");
   $stmt->bind_param("iis",$hosname, $docid, $ofchr);
   $stmt->execute();

    if($formselector=='F')
   {
      $stmt=$con->prepare("delete from wc_con_doc where doc_id=?");
      $stmt->bind_param("i", $docid);
      $stmt->execute();

      if($edate==NULL)
   {
      $stmt=$con->prepare("insert into wc_fulltm_doc (hire_sdate, yr_comp, doc_id) values (STR_TO_DATE(?, '%Y-%m-%d'), ?,?);");
      $stmt->bind_param("sii",$hrdate, $yrcomp, $docid);
   }
   else
   {
      $stmt=$con->prepare("insert into wc_fulltm_doc (hire_sdate, yr_comp, hire_edate, doc_id) values (STR_TO_DATE(?, '%Y-%m-%d'), ?, STR_TO_DATE(?, '%Y-%m-%d'),?);");
      $stmt->bind_param("sisi",$hrdate, $yrcomp, $edate, $docid);
   }

      $stmt->execute();
   }
   if($formselector=='C')
   {
      $stmt=$con->prepare("delete from wc_fulltm_doc where doc_id=?");
      $stmt->bind_param("i", $docid);
      $stmt->execute();

      $stmt=$con->prepare("insert into wc_con_doc (contract_no, contract_sdate, wk_rate, min_wkhrs, ort_hrrate, contract_edate, doc_id) values (?, STR_TO_DATE(?, '%Y-%m-%d'), ?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'),?);");
      $stmt->bind_param("isiiisi",$connum, $consdate, $wrate, $minhr, $ovrate, $conedate, $docid);
      $stmt->execute();

      
   }

   echo '<script type="text/javascript">'; 
echo 'alert("Edit Successful");'; 
echo 'window.location.href = "adminfac.php";';
echo '</script>';
?>