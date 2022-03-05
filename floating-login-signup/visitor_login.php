<!DOCTYPE html>
<html>
<head>
	<title>Visitor's Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<form action="signin_check.php" method="POST">
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
          <h2>New here?</h2>
          <p>Sign up!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already have an account, just sign in.</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <form action="signup.php" method="POST">
        <div class="form sign-up">
          <h2>Sign Up</h2>
          <label>
            <span>Username</span>
            <input type="text" id="username" name="username">
          </label>
          <label>
            <span> Email</span>
            <input type="email" id="email" name="email">
          </label>
          <label>
            <span>PASSWORD</span>
            <input type="password" id="password1" name="password1">
          </label>
          <label>
            <span> Confirm Password</span>
            <input type="password" id="password2" name="password2">
          </label>
          <label>
           <span>Answer a Security Question
            <label for="secques">Choose a question:</label>
            <select id="secques" name="secques">
            <option value="In which city were you born?">In which city were you born?</option>
            <option value="Who is your favorite fictional character?">Who is your favorite fictional character?</option>
            <option value="What high school did you attend?">What high school did you attend?</option>
            <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
            </select></span>
            <input type="text" id="secans" name="secans">
          </label>
          <button type="submit" class="submit">Sign Up Now</button>
        </div>
      </form>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>