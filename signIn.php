<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <div class="login-error"><?php echo ($_SESSION['loginError'] ?? ''); ?></div>
      <form action="config/signInFormHandler.php" method="POST">
        <input type="text" name="username" placeholder="Username (National Code)" value="<?php if(isset($_SESSION['inputUsername'])) {echo htmlspecialchars($_SESSION['inputUsername']);} ?>">
        <div class="red-text"><?php echo ($_SESSION['inputUsernameError'] ?? ''); ?></div>

        <input id="show-password" type="password" name="password" placeholder="Password">
        <i id="eye-icon-big" class="fa fa-eye eye-icon"></i>
        <div class="red-text"><?php echo ($_SESSION['inputPasswordError'] ?? ''); ?></div>

        <select name="userType">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>

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
  unset($_SESSION['inputPasswordError']);
?>

</html>

