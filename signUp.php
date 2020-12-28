<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <form action="config/signUpFormHandler.php" method="POST">
        <input type="text" name="firstname" placeholder="First Name">
        <input type="text" name="lastname" placeholder="Last Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="national-code" placeholder="National Code">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password-re-enter" placeholder="Re Enter Password">
        <input class="button" type="submit" name="sign-up" value="Sign Up">
      </form>
      <div class="sign-up">
        <p>Already Registered ?</p>
        <a href="login.php">Sign In</a>
      </div> 
    </div>
  </div>
</body>
</html>