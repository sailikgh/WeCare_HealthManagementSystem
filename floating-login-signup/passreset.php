<?php include 'C:\xampp\htdocs\PHPVSCode\connect.php';
    session_start();
    $username = $_POST['username'];
    $_SESSION['username'] = $username;

    $stmt = $con->prepare("select sec_q from wc_user where user_name=?;");

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 0) {
      header("Location: username_error.php"); 
    } else {
    while ($row = $result->fetch_assoc()) {
        $qq = $row['sec_q'];
    }
    }
    $_SESSION['ques'] = $qq;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <form action="passresetsucc.php" method="POST">
  <div class="cont">
    <div class="form reset-pass">
      <h2>Reset Password</h2>
      <label>
        <span><?= $qq ?></span>
        <span></span>
        <input type="text" name="secans" id="secans">
      </label>
      <label>
        <span>New Password</span>
        <p></p>
        <input type="password" name="password1" id="password1">
      </label>
      <label>
        <span>Retype Password</span>
        <p></p>
        <input type="password" name="password2" id="password2">
      </label>
      <button class="submit" type="submit">reset</button>

    </div>
  </div>
  </form>
<script type="text/javascript" src="script.js"></script>

</body>
</html>

