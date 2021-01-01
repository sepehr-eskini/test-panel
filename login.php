<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <div class="login-error"><?php echo ($_SESSION['loginError'] ?? ''); ?></div>
      <form action="config/signInFormHandler.php" method="POST">
        <input type="text" name="username" placeholder="Username (National Code)" value="<?php if(isset($_SESSION['inputUsername'])) {echo htmlspecialchars($_SESSION['inputUsername']);} ?>">
        <div class="red-text"><?php echo ($_SESSION['inputUsernameError'] ?? ''); ?></div>

        <input type="password" name="password" placeholder="Password">
        <div class="red-text"><?php echo ($_SESSION['inputPasswordError'] ?? ''); ?></div>

        <input class="button" type="submit" name="sign-in" value="Sign In">
      </form>
      <div class="sign-up">
        <p>Not Already Registered ?</p>
        <a href="signUp.php">Sign Up</a>
      </div> 
    </div>
  </div>
</body>

<?php
  unset($_SESSION['inputUsername']);
  unset($_SESSION['inputPassword']);
  unset($_SESSION['inputUsernameError']);
  unset($_SESSION['inputUsernameError']);
?>

</html>

