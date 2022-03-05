<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';


session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['username'] = $username;


$stmt = $con->prepare("select count(*) as count, user_password as passkey from wc_user where user_name=? and user_type='E';");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc())
{
    $qq = $row['count'];
    $correct_pass = $row['passkey'];
}

if ($qq == 0)
  {
    echo '<script type="text/javascript">'; 
            echo 'alert("No such user exists!");'; 
            echo 'window.location.href = "emp_login.php";';
            echo '</script>';
  } 
  else
  {
    if(password_verify($password, $correct_pass))
    {
      header("Location: ../employee/employee.php");
    }
    else
    {
      echo '<script type="text/javascript">'; 
            echo 'alert("Incorrect Password!");'; 
            echo 'window.location.href = "emp_login.php";';
            echo '</script>';
    }
    
  }

?>
