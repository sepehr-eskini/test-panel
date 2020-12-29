<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <form action="config/signInFormHandler.php" method="POST">
        <input type="text" name="username" placeholder="Username (National Code)">
        <input type="password" name="password" placeholder="Password">
        <input class="button" type="submit" name="sign-in" value="Sign In">
      </form>
      <div class="sign-up">
        <p>Not Already Registered ?</p>
        <a href="signUp.php">Sign Up</a>
      </div> 
    </div>
  </div>
</body>
</html>