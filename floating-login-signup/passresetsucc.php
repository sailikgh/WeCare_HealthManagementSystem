<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();
    $username = $_SESSION['username'];
    $ques = $_SESSION['ques'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $secans = $_POST['secans'];

    $stmt = $con->prepare("select * from wc_user where user_name=? and sec_q=? and sec_ans=?;");
    $stmt->bind_param("sss", $username, $ques, $secans);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 0) {
      echo("Wrong Answer!"); 
    } 
    
    else {

      if($password1==$password2)
      {
        $pass_encrypted = password_hash($password1, PASSWORD_DEFAULT);
        $stmt = $con->prepare("update wc_user SET user_password = ? WHERE user_name = ?;");
        $stmt->bind_param("ss", $pass_encrypted, $username); 
        $stmt->execute();
        echo '<script type="text/javascript">'; 
            echo 'alert("Password Changed Successfully");'; 
            echo 'window.location.href = "../";';
            echo '</script>';
      }
      else
      {
        echo ("Passwords Do Not Match");
      }
    }
?>