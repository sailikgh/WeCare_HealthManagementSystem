<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';


session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['username'] = $username;


$stmt = $con->prepare("select count(*) as count, user_password as passkey from wc_user where user_name=? and user_type='M';");
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
    echo("No such user exists!"); 
  } 
  else
  {
    if(password_verify($password, $correct_pass))
    {
      header("Location: ../admin/admin.php");
    }
    else
    {
      echo("Incorrect password!"); 
    }
    
  }

?>
