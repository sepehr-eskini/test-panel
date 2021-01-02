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
      <form action="config/signUpFormHandler.php" method="POST">
        <input type="text" name="firstname" placeholder="First Name" value="<?php if(isset($_SESSION['firstName'])) {echo htmlspecialchars($_SESSION['firstName']);} ?>">
        <div class="red-text"><?php echo ($_SESSION['firstNameError'] ?? ''); ?></div>

        <input type="text" name="lastname" placeholder="Last Name" value="<?php if(isset($_SESSION['lastName'])) {echo htmlspecialchars($_SESSION['lastName']);} ?>">
        <div class="red-text"><?php echo ($_SESSION['lastNameError'] ?? ''); ?></div>

        <input type="text" name="email" placeholder="Email" value="<?php if(isset($_SESSION['email'])) {echo htmlspecialchars($_SESSION['email']);} ?>">
        <div class="red-text"><?php echo ($_SESSION['emailError'] ?? ''); ?></div>

        <input type="text" name="national-code" placeholder="National Code" value="<?php if(isset($_SESSION['nationalCode'])) {echo htmlspecialchars($_SESSION['nationalCode']);} ?>">
        <div class="red-text"><?php echo ($_SESSION['nationalCodeError'] ?? ''); ?></div>

        <input type="password" name="password" placeholder="Password">
        <div class="red-text"><?php echo ($_SESSION['passwordError'] ?? ''); ?></div>

        <input type="password" name="re-password" placeholder="Re Enter Password">
        <div class="red-text"><?php echo ($_SESSION['rePasswordError'] ?? ''); ?></div>

        <input class="button" type="submit" name="sign-up" value="Sign Up">
      </form>
      <div class="sign-up">
        <p>Already Registered ?</p>
        <a href="signIn.php">Sign In</a>
      </div> 
    </div>
  </div>
</body>
</html>

<?php session_unset(); ?>