<!DOCTYPE html>
<html>
<head>
	<title>Administrator Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<form action="adminlogincheck.php" method="POST">
  <div class="cont">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <label>
        <span>username</span>
        <input type="text" id="username" name="username" required>
      </label>
      <label>
        <span>Password</span>
        <input type="password" id = "password "name="password" required>
      </label>
      <button type="submit" class="submit">Sign In</button>
      <a href="passreset1.php" class="forgot-pass">Forgot Password ?</a>
      </form>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h1>Welcome</h1>
          <h2>Administrator</h2>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already have an account, just sign in.</p>
        </div>
        
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <label>
          <span>Name</span>
          <input type="text">
        </label>
        <label>
          <span>User ID</span>
          <input type="email">
        </label>
        <label>
          <span>Password</span>
          <input type="password">
        </label>
        <label>
          <span>Confirm Password</span>
          <input type="password">
        </label>
        <button type="button" class="submit">Sign Up Now</button>
      </div>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>